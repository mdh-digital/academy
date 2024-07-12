@extends('layouts.auth')
@section('content')
<div class="col-xl-6 col-md-6 pe-sm-0">
    <div class="p-sm-5 p-3">
        <p class="h4 fw-semibold mb-2">Daftar Akun</p>
        <p class="mb-3 text-muted op-7 fw-normal">Silahkan Masukan data Diri anda di bawah ini</p>
        <x-validation-component></x-validation-component>
        <form method="POST" action="<?= route('register'); ?>" class="gy-3 mt-3">
            @csrf

            <!-- First Section Registration -->
            <div id="firstSection" class="row">

                <!-- Name  -->
                <div class="col-xl-12 mt-0">
                    <label for="user-name" class="form-label text-default">Nama Lengkap</label>
                    <input type="text" name="name" value="<?= old('name'); ?>" class="form-control form-control-lg" required id="user-name" placeholder="Masukkan Nama Lengkap Anda">
                </div>
                <!-- End Name -->

                <!-- Gender -->
                <div class="col-xl-12 mt-3">
                    <label for="user-gender" class="form-label text-default">Jenis Kelamin</label>
                    <select class="form-control form-control-lg" id="user-gender" name="gender" required>
                        <option value="">Pilih Gender Anda</option>
                        <option <?= old('gender') == 'pria' ? 'selected' : ''; ?> value="pria">Laki-laki</option>
                        <option <?= old('gender') == 'wanita' ? 'selected' : ''; ?> value="wanita">Perempuan</option>
                    </select>
                </div>
                <!-- End Gender -->

                <!-- Whatsapp Number -->
                <div class="col-xl-12 mt-3 mb-3">
                    <label for="user-phone" class="form-label text-default">Nomor Whatsapp Aktif</label>
                    <input type="number" name="phone" value="<?= old('phone'); ?>" class="form-control form-control-lg" required id="user-phone" placeholder="Masukkan Nomor Whatsapp">
                    <small>Masukkan nomor whatsapp dengan awalan 62, contoh : 628129064****</small>
                </div>
                <!-- End Whatsapp Number -->

                <!-- Verification Code -->
                <div class="col-xl-12 mt-3 mb-3 d-none formcode">
                    <label for="user-code" class="form-label text-default">Verifikasi Nomor Whatsapp</label>
                    <input type="text" name="code" value="<?= old('code'); ?>" class="form-control form-control-lg" required id="user-code" placeholder="Masukkan Kode Verifikasi">
                </div>
                <!-- End Verification Code -->

                <!-- Text and Button Action -->
                <div class="col-xl-12 d-grid mt-3">
                    <a class="text-info textverify" href="javascript:void(0);" onclick="sendVerifyWhatsapp()">Kirim Kode Verifikasi Whatsapp!</a>
                    <button type="button" class="btn btn-lg btn-primary d-none buttonverify">Verifikasi Whatsapp</button>
                </div>
                <!-- End Text and Button Action -->
            </div>
            <!-- End First Section -->

            <!-- Second Section -->
            <div id="secondSection" class="row d-none">

                <!-- Email Address -->
                <div class="col-xl-12 mt-0 mb-3">
                    <label for="user-email" class="form-label text-default">Alamat Email</label>
                    <input type="email" name="email" value="<?= old('email'); ?>" class="form-control form-control-lg" required id="user-email" placeholder="Masukkan Alamat Email Anda">
                </div>
                <!-- End Email Address -->

                <!-- Password -->
                <div class="col-xl-12 mb-3">
                    <label for="user-password" class="form-label text-default d-block">Password </label>
                    <div class="input-group">
                        <input type="password" class="form-control form-control-lg" name="password" required id="user-password" placeholder="password">
                        <button class="btn btn-light bg-transparent" type="button" onclick="createpassword('user-password',this)" ><i class="ri-eye-off-line align-middle"></i></button>
                    </div>
                </div>
                <!-- End Password -->

                <!-- Password Confirmation -->
                <div class="col-xl-12 mb-3">
                    <label for="user-password" class="form-label text-default d-block">Konfirmasi Password </label>
                    <div class="input-group">
                        <input type="password" class="form-control form-control-lg" name="password_confirmation" required id="user-password-confirmation" placeholder="password">
                        <button class="btn btn-light bg-transparent" type="button" onclick="createpassword('user-password-confirmation',this)" ><i class="ri-eye-off-line align-middle"></i></button>
                    </div>
                </div>
                <!-- End Password Confirmation -->

                <!-- Button Action -->
                <div class="col-xl-12 d-grid mt-3"> 
                    <button type="submit" class="btn btn-lg btn-primary">Daftarkan Akun</button>
                </div>
                <!-- End Button Action -->

            </div>
            <!-- End Second Section -->

        </form>

        <div class="text-center ">
            <p class="fs-12 text-muted mt-4 mb-0">Sudah Punya Akun ? <a href="{{route('login')}}" class="text-primary">Login</a></p>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function sendVerifyWhatsapp() {

        $(".textverify").addClass("d-none");
        $(".textloading").removeClass("d-none");

        var phone = $("#user-phone").val();
        var name = $("#user-name").val();

        $.ajax({
            url: '/register/ask-phone-verification',
            type: 'POST',
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                Accept: "application/json",
                "Content-Type": "application/json",
                timeout: 0,
            },
            data: JSON.stringify({
                name: name,
                phone: phone
            }),
            success: function(data, json, errorThrown) {

                if (data.status == false) {

                    $(".textverify").removeClass("d-none");
                    $(".textloading").addClass("d-none");

                    swal({
                        title: "Kesalahan!",
                        text: data.message,
                        type: "warning",
                        showCancelButton: false,
                        confirmButtonClass: "btn btn-danger",
                        confirmButtonText: "Ok Saya Mengerti",
                        closeOnConfirm: false
                    });
                } else {
                    toastr.success(data.message, {
                        positionClass: "toast-top-right",
                        timeOut: 5e3,
                        closeButton: !0,
                        debug: !1,
                        newestOnTop: !0,
                        progressBar: !0,
                        preventDuplicates: !0,
                        onclick: null,
                        showDuration: "300",
                        hideDuration: "1000",
                        extendedTimeOut: "1000",
                        showEasing: "swing",
                        hideEasing: "linear",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                        tapToDismiss: !1,
                    });

                    $(".formcode").removeClass("d-none");
                    $(".buttonverify").removeClass("d-none");
                    $(".verifysend").addClass("d-none");
                }
            },
            cache: false,
            contentType: false,
            processData: false,
        })


    }

    $(".buttonverify").on("click", function() {

        var phone = $("#user-phone").val();
        var code = $("#user-code").val();

        $(".buttonverify").html("Loading....");

        $.ajax({
            url: '/register/whatsapp-verification',
            type: 'POST',
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                Accept: "application/json",
                "Content-Type": "application/json",
                timeout: 0,
            },
            data: JSON.stringify({
                code: code,
                phone: phone
            }),
            success: function(data, json, errorThrown) {

                if (data.status == false) {

                    $(".buttonverify").html("Verifikasi Whatsapp");

                    toastr.error(data.message, "Peringatan!", {
                        timeOut: 500000000,
                        closeButton: !0,
                        debug: !1,
                        newestOnTop: !0,
                        progressBar: !0,
                        positionClass: "toast-top-right",
                        preventDuplicates: !0,
                        onclick: null,
                        showDuration: "300",
                        hideDuration: "1000",
                        extendedTimeOut: "1000",
                        showEasing: "swing",
                        hideEasing: "linear",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                        tapToDismiss: !1,
                    });
                } else {
                    toastr.success(data.message, {
                        positionClass: "toast-top-right",
                        timeOut: 5e3,
                        closeButton: !0,
                        debug: !1,
                        newestOnTop: !0,
                        progressBar: !0,
                        preventDuplicates: !0,
                        onclick: null,
                        showDuration: "300",
                        hideDuration: "1000",
                        extendedTimeOut: "1000",
                        showEasing: "swing",
                        hideEasing: "linear",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                        tapToDismiss: !1,
                    });

                    $("#firstSection").addClass("d-none");
                    $("#secondSection").removeClass("d-none");

                }
            },
            cache: false,
            contentType: false,
            processData: false,
        })


    })
</script>
@endsection