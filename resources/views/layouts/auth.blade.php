<!DOCTYPE html>
<html lang="id" dir="ltr" data-nav-layout="vertical" data-vertical-style="overlay" data-theme-mode="light" data-header-styles="light" data-menu-styles="light" data-toggled="close">

<head>

    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> PasarSafe Academy - {{$page}} </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="Author" content="Manufactur Digital Hub">
    <meta name="title" content="PasarSafe Academy: Platform Belajar Online Gratis dengan Manajemen Tugas, Absensi, dan Portofolio Siswa">
    <meta name="description" content="PasarSafe Academy adalah platform belajar online gratis yang menyediakan pengelolaan tugas, absensi, dan portofolio siswa. Kami juga akan bekerja sama dengan perusahaan untuk menyalurkan pekerja cemerlang. Bergabunglah dengan kami untuk pengalaman belajar yang luar biasa dan kesempatan karier yang cerah.">
    <meta name="keywords" content="PasarSafe Academy, belajar online gratis, platform belajar, pengelolaan tugas, absensi siswa, portofolio siswa, karier cemerlang, kerjasama perusahaan, pendidikan online">
    <meta property="og:title" content="PasarSafe Academy: Platform Belajar Online Gratis dengan Manajemen Tugas, Absensi, dan Portofolio Siswa">
    <meta property="og:description" content="PasarSafe Academy adalah platform belajar online gratis yang menyediakan pengelolaan tugas, absensi, dan portofolio siswa. Kami juga bekerja sama dengan perusahaan untuk menyalurkan pekerja cemerlang. Bergabunglah dengan kami untuk pengalaman belajar yang luar biasa dan kesempatan karier yang cerah.">
    <meta property="og:image" content="<?=asset('img/p-icon.png');?>">
    <meta property="og:url" content="<?=url('/');?>">
    <meta property="og:type" content="website"> 
    <meta name="twitter:title" content="PasarSafe Academy: Platform Belajar Online Gratis dengan Manajemen Tugas, Absensi, dan Portofolio Siswa">
    <meta name="twitter:description" content="PasarSafe Academy adalah platform belajar online gratis yang menyediakan pengelolaan tugas, absensi, dan portofolio siswa. Kami juga bekerja sama dengan perusahaan untuk menyalurkan pekerja cemerlang. Bergabunglah dengan kami untuk pengalaman belajar yang luar biasa dan kesempatan karier yang cerah.">
    <meta name="twitter:image" content="<?=asset('img/p-icon.png');?>">

    <!-- Favicon -->
    <link rel="icon" href="<?=asset('img/p-icon.png');?>" type="image/x-icon">
    <script src="{{asset('adminassets/js/authentication-main.js')}}"></script>

    <link id="style" href="{{asset('adminassets/libs/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('adminassets/css/styles.min.css')}}" rel="stylesheet">
    <link href="{{asset('adminassets/css/icons.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('adminassets/libs/toastr/toastr.min.css')}}">
    <link href="{{asset('adminassets/libs/sweet-alert/sweetalert.css')}}" rel="stylesheet">

</head>

<body>

    <div class="page error-bg" id="particles-js">
        <!-- Start::error-page -->
        <div class="error-page  ">
            <div class="container">
                <!-- Start::row-1 -->
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-md-12 col-sm-10 ">
                        <div class="card custom-card  rectangle2">
                            <div class="card-body p-0 ">
                                <div class="row">


                                    @yield('content')

                                    <div class="col-xl-6 col-md-6 ps-0 text-fixed-white rounded-0 d-none d-md-block  ">
                                        <div class="card custom-card mb-0 cover-background overflow-hidden rounded-end rounded-0">
                                            <div class="card-img-overlay d-flex  align-items-center p-0 rounded-0">
                                                <div class="card-body p-5 rectangle3">
                                                    <div>
                                                        <a href="{{route('login')}}"> 
                                                            <img src="{{asset('img/p-logo-white.png')}}" alt="logo" class="desktop-dark w-100">
                                                        </a>
                                                    </div>
                                                    <h6 class="mt-4 fs-15 op-9  text-fixed-white">Selamat Datang</h6>
                                                    <div class="d-flex mt-3">
                                                        <p class="mb-0 fw-normal fs-14 op-7  text-fixed-white">
                                                            PasarSafe Academy merupakan platform belajar online gratis dengan management silabus yang terstruktur layaknya platform belajar berbayar.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End::row-1 -->
        </div>
    </div>
    <!-- End::error-page -->


    <script src="{{asset('adminassets/libs/jquery/jquery.min.js')}}" ></script>
    <script src="{{asset('adminassets/libs/bootstrap/js/bootstrap.bundle.min.js')}}" defer></script>
    <script src="{{asset('adminassets/js/show-password.js')}}" defer></script>

    <script src="{{ asset('adminassets/libs/toastr/toastr.min.js') }}" defer></script>
    <script src="{{ asset('adminassets/libs/toastr/evolution.js') }}" defer></script>

    <script src="{{asset('adminassets/libs/sweet-alert/sweetalert.min.js')}}" defer></script>
    <script src="{{asset('adminassets/libs/sweet-alert/jquery.sweet-alert.js')}}" defer></script>

    @yield('scripts')
</body>

</html>