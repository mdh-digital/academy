<header class="app-header">

    <!-- Start::main-header-container -->
    <div class="main-header-container container-fluid">

        <!-- Start::header-content-left -->
        <div class="header-content-left">

            <!-- Start::header-element -->
            <div class="header-element">
                <div class="horizontal-logo">
                    <a href="index.html" class="header-logo">
                        <img src="{{asset('img/p-logo-white.png')}}" alt="logo" class="desktop-logo w-100">
                        <img src="{{asset('img/p-icon.png')}}" alt="logo" class="toggle-logo w-100">
                        <img src="{{asset('img/p-logo-white.png')}}" alt="logo" class="desktop-dark w-100">
                        <img src="{{asset('img/p-icon.png')}}" alt="logo" class="toggle-dark w-100">
                    </a>
                </div>
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element">
                <!-- Start::header-link -->
                <a aria-label="anchor" href="javascript:void(0);" class="sidemenu-toggle header-link" data-bs-toggle="sidebar">
                    <span class="open-toggle me-2">
                        <i class="bx bx-menu header-link-icon"></i>
                    </span>
                </a>


                <!-- End::header-link -->
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element header-search d-lg-none d-block ">
                <!-- Start::header-link -->
                <a aria-label="anchor" href="javascript:void(0);" class="header-link" data-bs-toggle="modal" data-bs-target="#searchModal">
                    <i class="bx bx-search-alt-2 header-link-icon"></i>
                </a>
                <!-- End::header-link -->
            </div>
            <!-- End::header-element -->

        </div>
        <!-- End::header-content-left -->

        <!-- Start::header-content-right -->
        <div class="header-content-right">


            <!-- Start::header-element -->
            <div class="header-element header-theme-mode">
                <!-- Start::header-link|layout-setting -->
                <a aria-label="anchor" href="javascript:void(0);" class="header-link layout-setting">
                    <!-- Start::header-link-icon -->
                    <i class="bx bx-sun bx-flip-horizontal header-link-icon ionicon  dark-layout"></i>
                    <!-- End::header-link-icon -->
                    <!--  Start::header-link-icon -->
                    <i class="bx bx-moon bx-flip-horizontal header-link-icon ionicon light-layout"></i>
                    <!-- End::header-link-icon -->
                </a>
                <!-- End::header-link|layout-setting -->
            </div>
            <!-- End::header-element -->



            <!-- Start::header-element -->
            <div class="header-element notifications-dropdown ">
                <!-- Start::header-link|dropdown-toggle -->
                <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside" id="messageDropdown" aria-expanded="false">
                    <i class="bx bx-bell bx-flip-horizontal header-link-icon ionicon"></i>
                    <span class="badge bg-info rounded-pill header-icon-badge pulse pulse-secondary" id="notification-icon-badge">0</span>
                </a>
                <!-- End::header-link|dropdown-toggle -->
                <!-- Start::main-header-dropdown -->
                <div class="main-header-dropdown dropdown-menu  border-0 dropdown-menu-end" data-popper-placement="none">
                    <div class="p-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 fs-17 fw-semibold">Pemberitahuan</p>
                            <span class="badge bg-secondary-transparent" id="notifiation-data">0 Belum Di Baca</span>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <ul class="list-unstyled mb-0" id="header-notification-scroll">

                    </ul>
                    <div class="p-3 empty-header-item1 border-top d-none">
                        <div class="d-grid">
                            <a href="notifications.html" class="btn btn-primary">Lihat Semua</a>
                        </div>
                    </div>
                    <div class="p-5 empty-item1">
                        <div class="text-center">
                            <span class="avatar avatar-xl avatar-rounded bg-secondary-transparent">
                                <i class="bx bx-bell-off bx-tada fs-2"></i>
                            </span>
                            <h6 class="fw-semibold mt-3">Belum Ada Pemberitahuan</h6>
                        </div>
                    </div>
                </div>
                <!-- End::main-header-dropdown -->
            </div>
            <!-- End::header-element -->
            <div class="header-element d-flex header-settings header-shortcuts-dropdown">
                <a aria-label="anchor" href="javascript:void(0);" class=" header-link nav-link icon" data-bs-toggle="offcanvas" data-bs-target="#apps" aria-controls="apps">
                    <i class="bx bx-category  header-link-icon"></i>
                </a>
            </div>

            <div class="offcanvas offcanvas-end wd-330" tabindex="-1" id="apps" aria-labelledby="appsLabel">
                <div class="offcanvas-header border-bottom">
                    <h5 id="appsLabel" class="mb-0 fs-18">Related Apps</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"> <i class="bx bx-x   apps-btn-close"></i></button>
                </div>
                <div class="p-3">
                    <div class="row g-3">
                        <div class="col-6">
                            <a href="full-calendar.html">
                                <div class="text-center p-3 related-app border">
                                    <span class="avatar fs-23 bg-success-transparent p-2 mb-2">
                                        <i class="bx bx-calendar text-success"></i>
                                    </span>
                                    <span class="d-block fs-13 text-muted fw-semibold">Calendar</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="mail.html">
                                <div class="text-center p-3 related-app border">
                                    <span class="avatar  fs-23 bg-info-transparent p-2 mb-2">
                                        <i class="bx bx-envelope  text-info"></i>
                                    </span>
                                    <span class="d-block fs-13 text-muted fw-semibold">Mail</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="profile.html">
                                <div class="text-center p-3 related-app border">
                                    <span class="avatar bg-warning-transparent fs-23 bg p-2 mb-2">
                                        <i class="bx bx-user  text-warning"></i>
                                    </span>
                                    <span class="d-block fs-13 text-muted fw-semibold">Profile</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="chat.html">
                                <div class="text-center p-3 related-app border">
                                    <span class="avatar    bg-pink-transparent fs-23 bg p-2 mb-2">
                                        <i class="bx bx-chat text-pink"></i>
                                    </span>
                                    <span class="d-block fs-13 text-muted fw-semibold">Chat</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="contacts.html">
                                <div class="text-center p-3 related-app border">
                                    <span class="avatar    bg-secondary-transparent fs-23 bg p-2 mb-2">
                                        <i class="bx bx-phone text-secondary"></i>
                                    </span>
                                    <span class="d-block fs-13 text-muted fw-semibold">Contacts</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="mail-settings.html">
                                <div class="text-center p-3 related-app border">
                                    <span class="avatar    bg-teal-transparent fs-23 bg p-2 mb-2">
                                        <i class="bx bx-cog text-teal"></i>
                                    </span>
                                    <span class="d-block fs-13 text-muted fw-semibold">Settings</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start::header-element -->

            <!-- Start::header-element -->
            <div class="header-element header-fullscreen">
                <!-- Start::header-link -->
                <a aria-label="anchor" onclick="openFullscreen();" href="javascript:void(0);" class="header-link">
                    <i class="bx bx-fullscreen header-link-icon  full-screen-open"></i>
                    <i class="bx bx-exit-fullscreen header-link-icon  full-screen-close  d-none"></i>
                </a>
                <!-- End::header-link -->
            </div>
            <!-- End::header-element -->



            <!-- Start::header-element -->
            <div class="header-element mainuserProfile">
                <!-- Start::header-link|dropdown-toggle -->
                <a href="javascript:void(0);" class="header-link dropdown-toggle" id="mainHeaderProfile" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    <div class="d-flex align-items-center">
                        <div class="d-sm-flex wd-100p">
                            <div class="avatar avatar-sm"><img alt="avatar" class="rounded-circle" src="{{asset(auth()->user()->image_data)}}"></div>
                            <div class="ms-2 my-auto d-none d-xl-flex">
                                <h6 class=" font-weight-semibold mb-0 fs-13 user-name d-sm-block d-none">{{auth()->user()->name}}</h6>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- End::header-link|dropdown-toggle -->
                <ul class="dropdown-menu  border-0 main-header-dropdown  overflow-hidden header-profile-dropdown" aria-labelledby="mainHeaderProfile">
                    <li><a class="dropdown-item border-bottom" href="profile.html"><i class="fs-13 me-2 bx bx-user"></i>Profile</a></li>
                    <li><a class="dropdown-item border-bottom" href="mail.html"><i class="fs-13 me-2 bx bx-comment"></i>Message</a></li>
                    <li><a class="dropdown-item border-bottom" href="mail-settings.html"><i class="fs-13 me-2 bx bx-cog"></i>Settings</a></li>
                    <li><a class="dropdown-item border-bottom" href="faq's.html"><i class="fs-13 me-2 bx bx-help-circle"></i>Help</a></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fs-13 me-2 bx bx-arrow-to-right"></i>Keluar</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
            <!-- End::header-element -->



        </div>
        <!-- End::header-content-right -->

    </div>
    <!-- End::main-header-container -->

</header>