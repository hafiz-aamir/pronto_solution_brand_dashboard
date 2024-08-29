<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/login.css" />
    <link rel="stylesheet" href="assets/css/topbar.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/responsive.css" />
    <title>Document</title>
</head>

<body>
    <!-- Left Sidebar -->
    <!-- ============================================================== -->
    <aside class="left-sidebar" id="sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <img class="logo-sidebar" src="assets/images/logo.png" alt="" />
                <img src="assets/images/logo-sm.png" alt="user" class="logoSm" />
                <ul id="sidebarnav">
                    <li>
                        <a class="waves-effect waves-dark <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>"
                            href="index.php" aria-expanded="false">
                            <img src="assets/images/meter.png" alt=""><span class="hide-menu">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a class="waves-effect waves-dark <?php $activePages = ['leads.php', 'leads-detail.php'];
                                                            echo in_array(basename($_SERVER['PHP_SELF']), $activePages) ? 'active' : ''; ?>" href="leads.php" aria-expanded="false">
                            <!-- href="leads.php" aria-expanded="false"> -->
                            <img src="assets/images/list.png" alt=""><span class="hide-menu">Leads Lists</span>
                        </a>
                    </li>
                    <li>
                        <a class="waves-effect waves-dark <?php $activePages = ['users-management.php', 'add-user.php'];
                                                            echo in_array(basename($_SERVER['PHP_SELF']), $activePages) ? 'active' : ''; ?>" href="users-management.php" aria-expanded="false">
                            <img src="assets/images/user-mng.png" alt=""><span class="hide-menu">Users Management</span>
                        </a>
                    </li>
                </ul>

            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar   -->
    <!-- ============================================================== -->

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
        <!-- <img class="d-lg-none d-block" width="100" src="assets/images/logo.png" alt="" /> -->




        <ul class="my-lg-0 btn-and-profile-parent">
            <!-- ============================================================== -->
            <!-- Profile -->
            <!-- ============================================================== -->


            <li class=" d-flex align-items-center gap-4">
                <a class="profile-pic text-black" href="#">
                    <img src="assets/images/header-right.png" alt="user" class="topbar--right-img" />

                    <div class="d-flex flex-column align-items-start">
                        <span class="hidden-md-down fs-14px fw-bold">Ali Hamza</span>
                        <span class="hidden-md-down fs-12px fw-semibold">Admin</span>
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
                    <li><a class="dropdown-item d-flex align-items-center gap-2" href="#"><img src="assets/images/manage-acc.png" alt="">Manage Account</a></li>
                    <li><a class="dropdown-item d-flex align-items-center gap-2" href="login.php"><img src="assets/images/logout.png" alt="">Logout</a></li>
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