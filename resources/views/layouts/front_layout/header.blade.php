    <!------------------- TopBar-------------------- -->
    <div class="navbar-collapse d-flex flex-lg-row flex-row-reverse justify-content-between topbar-main">
        <!-- ============================================================== -->
        <!-- toggle and nav items -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- User profile and search -->
        <!-- ============================================================== -->

        <div>
            <i style="cursor: pointer; font-size: 19px;" id="hambutton" class="fa-solid fa-bars"></i>
        </div>
        <!-- <img class="d-lg-none d-block" width="100" src="{{ asset('assets/images/logo.png') }}" alt="" /> -->




        <ul class="my-lg-0 btn-and-profile-parent">
            <!-- ============================================================== -->
            <!-- Profile -->
            <!-- ============================================================== -->


            <li class=" d-flex align-items-center gap-4">
                <a class="profile-pic text-black" href="#">
                    <img src="{{ asset('assets/images/header-right.png') }}" alt="user" class="topbar--right-img" />

                    <div class="d-flex flex-column align-items-start">
                        <span class="hidden-md-down fs-14px fw-bold"> {{ Auth::user()->fname }} {{ Auth::user()->lname }} </span>
                        <span class="hidden-md-down fs-12px fw-semibold"> {{ Auth::user()->role->role }} </span>
                    </div>
                </a>
            </li>
            <li class="nav-item dropdown u-pro d-flex align-items-center gap-4">
                <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="#" id="navbarDropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="header-chevron-parent">
                        <i class="fa-solid fa-chevron-down"></i>
                    </span>

                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('user_management') }}"><img src="{{ asset('assets/images/manage-acc.png') }}" alt="">Manage Account</a></li>
                    <li><a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('logout') }}"><img src="{{ asset('assets/images/logout.png') }}" alt="">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- mobile navs  -->
    <div class="mobile-nav-parent d-lg-none" id="mobilenav">
        <div class="mobile-nav-links-parent d-flex justify-content-between">
            <ul>

            </ul>

        </div>
    </div>
    <!-- mobile navs  -->
    <!------------------- TopBar Ends-------------------- -->