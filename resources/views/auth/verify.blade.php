@extends('layouts.auth')
@section('content')
<div class="col-xl-6 col-md-6 pe-sm-0">
    <div class="p-sm-5 p-3">
        <p class="h4 fw-semibold mb-2">Verifikasi Email</p>
        <p class="mb-3 text-muted op-7 fw-normal">
            Kode Verifikasi Email telah kami kirimkan Melalui Email Anda! Silahkan check kontak masuk atau spam email. Jika Anda belum menerima Email, silahkan klik Kirim Ulang Di Bawah ini
        </p>
        @if (session('resent'))
        <div class="alert alert-success" role="alert">
            Kode Verifikasi telah kami kirimkan kembali!
        </div>
        @endif
        <x-validation-component></x-validation-component>
        <form method="POST" action="<?= route('verification.resend'); ?>" class="row gy-3 mt-3">
            @csrf
            <div class="col-xl-12 d-grid mt-3">
                <button type="submit" class="btn btn-lg btn-primary">Kirim ulang Kode Verifikasi</button>
            </div>
        </form>

    </div>
</div>
@endsection