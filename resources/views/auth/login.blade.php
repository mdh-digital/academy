@extends('layouts.auth')
@section('content')
<div class="col-xl-6 col-md-6 pe-sm-0">
    <div class="p-sm-5 p-3">
        <p class="h4 fw-semibold mb-2">Masuk Akun</p>
        <p class="mb-3 text-muted op-7 fw-normal">Silahkan Masukan Akun anda</p>
        <x-validation-component></x-validation-component>
        <form method="POST" action="<?= route('login'); ?>" class="row gy-3 mt-3">
            @csrf
            <div class="col-xl-12 mt-0">
                <label for="user-email" class="form-label text-default">Alamat Email</label>
                <input type="email" name="email" value="<?= old('email'); ?>" class="form-control form-control-lg" required id="user-email" placeholder="Masukkan Alamat Email Anda">
            </div>
            <div class="col-xl-12 mb-3">
                <label for="user-password" class="form-label text-default d-block">Password
                    <a href="{{ route('password.request') }}" class="float-end text-primary">Kamu Lupa Password ?</a>
                </label>
                <div class="input-group">
                    <input type="password" class="form-control form-control-lg" name="password" required id="user-password" placeholder="password">
                    <button class="btn btn-light bg-transparent" type="button" onclick="createpassword('user-password',this)" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button>
                </div>
                <div class="mt-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" <?= old('remember') ? 'checked' : ''; ?> value="" id="defaultCheck1">
                        <label class="form-check-label text-muted fw-normal" for="defaultCheck1">
                            Simpan Credensial ?
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 d-grid mt-3">
                <button type="submit" class="btn btn-lg btn-primary">Masuk Sekarang</button>
            </div>
        </form>

        <div class="text-center ">
            <p class="fs-12 text-muted mt-4 mb-0">Belum Punya Akun ? <a href="{{route('register')}}" class="text-primary">Daftar Akun</a></p>
        </div>
    </div>
</div>
@endsection