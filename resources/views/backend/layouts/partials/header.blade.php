<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                <i class="ti-menu ti-close"></i>
            </a>
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <div class="navbar-brand">
                <a href="{{ route('admin.index') }}" class="logo">
                    <!-- Logo icon -->
                    <b class="logo-icon">
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        @if (empty($settings->general->logo))
                            <i class="wi wi-sunset"></i>
                        @endif
                    </b>
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <span class="logo- text-white">
                        @if (!empty($settings->general->logo))
                            <img src="{{ asset('public/assets/images/logo/' . $settings->general->logo) }}"
                                alt="" width="50" />
                        @endif
                        <!-- dark Logo text -->
                        <span>
                            {{ $settings->general->name }}
                        </span>
                        {{-- <img src="{{ asset('public/assets/backend/images/logo-light-text.png') }}" alt="homepage" class="dark-logo" /> --}}
                        <!-- Light Logo text -->
                        {{-- <img src="{{ asset('public/assets/backend/images/logo-light-text.png') }}" class="light-logo" alt="homepage" /> --}}
                    </span>
                </a>
                <a class="sidebartoggler d-none d-md-block" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                    <i class="mdi mdi-toggle-switch mdi-toggle-switch-off font-20"></i>
                </a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <i class="ti-more"></i>
            </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-left mr-auto">
                <li class="nav-item d-none d-md-block">
                    <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)"
                        data-sidebartype="mini-sidebar">
                        <i class="mdi mdi-menu font-24"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-md-block">
                    <a class="nav-link sidebartoggler waves-effect waves-light" href="{{ route('index') }}"
                        target="_blank">
                        <i class="mdi mdi-eye font-16"></i>
                        <span> View Site </span>
                    </a>
                </li>
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->
                <li class="nav-item search-box">
                    <a class="nav-link waves-effect waves-dark" href="javascript:void(0)">
                        <div class="d-flex align-items-center">
                            <i class="mdi mdi-magnify font-20 mr-1"></i>
                            <div class="ml-1 d-none d-sm-block">
                                <span>Search</span>
                            </div>
                        </div>
                    </a>
                    <form class="app-search position-absolute">
                        <input type="text" class="form-control" placeholder="Search &amp; enter">
                        <a class="srh-btn">
                            <i class="ti-close"></i>
                        </a>
                    </form>
                </li>
            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-right">

                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="font-22 mdi mdi-email-outline"></i>

                    </a>
                    <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown" aria-labelledby="2">
                        <span class="with-arrow">
                            <span class="bg-danger"></span>
                        </span>
                        @include('backend.layouts.partials.header-messages')
                    </div>
                </li> --}}

                {{-- <li class="nav-item dropdown border-right">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="mdi mdi-bell-outline font-22"></i>
                        <span class="badge badge-pill badge-info noti">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                        <span class="with-arrow">
                            <span class="bg-primary"></span>
                        </span>
                        @include('backend.layouts.partials.header-notifications')
                    </div>
                </li> --}}


                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark pro-pic" href=""
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset(App\Helpers\ReturnPathHelper::getAdminImage(Auth::id())) }}" alt="user"
                            class="rounded-circle" width="40">
                        <span class="m-l-5 font-medium d-none d-sm-inline-block">
                            {{ Auth::user()->first_name }}
                            <i class="mdi mdi-chevron-down"></i></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                        <span class="with-arrow">
                            <span class="bg-primary"></span>
                        </span>
                        <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                            <div class="">
                                <img src="{{ asset(App\Helpers\ReturnPathHelper::getAdminImage(Auth::id())) }}"
                                    alt="user" class="rounded-circle" width="60">
                            </div>
                            <div class="m-l-10">
                                <h4 class="m-b-0">{{ Auth::user()->first_name }} </h4>
                                <p class=" m-b-0">{{ Auth::user()->email }} </p>
                            </div>
                        </div>
                        <div class="profile-dis scrollable">
                            <a class="dropdown-item" href="{{ route('admin.admins.profile.edit') }}">
                                <i class="ti-user m-r-5 m-l-5"></i> Edit My Profile</a>
                            <a class="dropdown-item" href="javascript:void(0)"
                                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                            {{-- <div class="dropdown-divider"></div> --}}
                        </div>
                    </div>
                </li>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
            </ul>
        </div>
    </nav>
</header>
