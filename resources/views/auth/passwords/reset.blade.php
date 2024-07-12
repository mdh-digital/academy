@extends('layouts.auth')
@section('content')
<div class="col-xl-6 col-md-6 pe-sm-0">
    <div class="p-sm-5 p-3">
        <p class="h4 fw-semibold mb-2">Ubah Password</p>
        <p class="mb-3 text-muted op-7 fw-normal">Silahkan Masukkan Password Baru Anda</p>
        <x-validation-component></x-validation-component>
        <form method="POST" action="{{ route('password.update') }}" class="row gy-3 mt-3">
            @csrf

            <div class="col-xl-12 mb-3">
                <input type="hidden" name="email" value="<?= $email; ?>">
                <input type="hidden" name="token" value="{{ $token }}">
                <label for="user-password" class="form-label text-default d-block">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control form-control-lg" name="password" required id="user-password" placeholder="password">
                    <button class="btn btn-light bg-transparent" type="button" onclick="createpassword('user-password',this)" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button>
                </div>
            </div>
            <div class="col-xl-12 mb-3">
                <label for="user-password" class="form-label text-default d-block">Konfirmasi Password </label>
                <div class="input-group">
                    <input type="password" class="form-control form-control-lg" name="password_confirmation" required id="user-password-confirmation" placeholder="password">
                    <button class="btn btn-light bg-transparent" type="button" onclick="createpassword('user-password-confirmation',this)"><i class="ri-eye-off-line align-middle"></i></button>
                </div>
            </div>
            <div class="col-xl-12 d-grid mt-3">
                <button type="submit" class="btn btn-lg btn-primary">Ubah Password</button>
            </div>
        </form>

    </div>
</div>
@endsection