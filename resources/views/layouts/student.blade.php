<!DOCTYPE html>
<html lang="id" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="gradient" data-menu-styles="dark">

<head>

    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> PasarSafe Academy - {{$page}} </title>
    <meta name="Author" content="Manufactur Digital Hub">
    <meta name="title" content="PasarSafe Academy: Platform Belajar Online Gratis dengan Manajemen Tugas, Absensi, dan Portofolio Siswa">
    <meta name="description" content="PasarSafe Academy adalah platform belajar online gratis yang menyediakan pengelolaan tugas, absensi, dan portofolio siswa. Kami juga akan bekerja sama dengan perusahaan untuk menyalurkan pekerja cemerlang. Bergabunglah dengan kami untuk pengalaman belajar yang luar biasa dan kesempatan karier yang cerah.">
    <meta name="keywords" content="PasarSafe Academy, belajar online gratis, platform belajar, pengelolaan tugas, absensi siswa, portofolio siswa, karier cemerlang, kerjasama perusahaan, pendidikan online">
    <meta property="og:title" content="PasarSafe Academy: Platform Belajar Online Gratis dengan Manajemen Tugas, Absensi, dan Portofolio Siswa">

    <!-- Favicon -->
    <meta property="og:image" content="<?= asset('img/p-icon.png'); ?>"> 
    <link rel="icon" href="<?=asset('img/p-icon.png');?>" type="image/x-icon">

    <!-- Main Theme Js -->
    <script src="{{asset('adminassets/js/main.js')}}"></script>

    <!-- Bootstrap Css -->
    <link id="style" href="{{asset('adminassets/libs/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Style Css -->
    <link href="{{asset('adminassets/css/styles.css')}}" rel="stylesheet">

    <!-- Icons Css -->
    <link href="{{asset('adminassets/css/icons.css')}}" rel="stylesheet">

    <!-- Node Waves Css -->
    <link href="{{asset('adminassets/libs/node-waves/waves.min.css')}}" rel="stylesheet">

    <!-- Simplebar Css -->
    <link href="{{asset('adminassets/libs/simplebar/simplebar.min.css')}}" rel="stylesheet">

    @yield('styles')

</head>

<body>

    <!-- Loader -->
    <div id="loader">
        <img src="{{asset('img/loader.svg')}}" alt="">
    </div>
    <!-- Loader -->

    <div class="page">
        <!-- app-header -->
        <x-student.header-component></x-student.header-component>
        <!-- /app-header -->

        <!-- Start::app-sidebar -->
        <x-student.sidebar-component></x-student.sidebar-component>
        <!-- End::app-sidebar -->

        <!-- Page Header -->
        <div class="d-sm-flex d-block align-items-center justify-content-between page-header-breadcrumb">
            <h4 class="fw-medium mb-0">Empty</h4>
            <div class="ms-sm-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Empty</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header Close -->


        @yield('content')

        <!-- Footer Start -->
        <x-student.footer-component></x-student.footer-component>
        <!-- Footer End -->

 

    </div>


    <div class="scrollToTop">
        <span class="arrow"><i class="ri-arrow-up-circle-fill fs-20"></i></span>
    </div>
    <div id="responsive-overlay"></div>

    <!-- Popper JS -->
    <script src="{{asset('adminassets/libs/@popperjs/core/umd/popper.min.js')}}"></script>

    <!-- Bootstrap JS -->
    <script src="{{asset('adminassets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Defaultmenu JS -->
    <script src="{{asset('adminassets/js/defaultmenu.min.js')}}"></script>

    <!-- Node Waves JS-->
    <script src="{{asset('adminassets/libs/node-waves/waves.min.js')}}"></script>

    <!-- Sticky JS -->
    <script src="{{asset('adminassets/js/sticky.js')}}"></script>

    <!-- Simplebar JS -->
    <script src="{{asset('adminassets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('adminassets/js/simplebar.js')}}"></script>

    <!-- Custom JS -->
    <script src="{{asset('adminassets/js/custom.js')}}"></script>

    @yield('scripts')

</body>

</html>