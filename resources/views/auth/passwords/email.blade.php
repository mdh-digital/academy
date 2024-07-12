@extends('layouts.auth')
@section('content')
<div class="col-xl-6 col-md-6 pe-sm-0">
    <div class="p-sm-5 p-3">
        <p class="h4 fw-semibold mb-2">Lupa Password ?</p>
        <p class="mb-3 text-muted op-7 fw-normal">Kirim Permintaan untuk Ubah Password</p>
        <x-validation-component></x-validation-component>
        <form method="POST" action="{{ route('password.email') }}" class="row gy-3 mt-3">
            @csrf
            <div class="col-xl-12 mt-0">
                <label for="user-email" class="form-label text-default">Alamat Email</label>
                <input type="email" name="email" value="<?= old('email'); ?>" class="form-control form-control-lg" required id="user-email" placeholder="Masukkan Alamat Email Anda">
            </div>
            
            <div class="col-xl-12 d-grid mt-3">
                <button type="submit" class="btn btn-lg btn-primary">Kirim Permintaan</button>
            </div>
        </form>

        <div class="text-center ">
            <p class="fs-12 text-muted mt-4 mb-0">Sudah Ingat Password ? <a href="{{route('login')}}" class="text-primary">Login</a></p>
        </div>
    </div>
</div>
@endsection