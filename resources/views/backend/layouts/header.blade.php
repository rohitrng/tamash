<header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="index.html" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="assets/images/logo-sm.svg" alt="" height="26">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo-sm.svg" alt="" height="26"> <span class="logo-txt">Vuesy</span>
                            </span>
                        </a>

                        <a href="index.html" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="assets/images/logo-sm.svg" alt="" height="26">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo-sm.svg" alt="" height="26"> <span class="logo-txt">Vuesy</span>
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item" data-bs-toggle="collapse" id="horimenu-btn" data-bs-target="#topnav-menu-content">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>

                    <div class="topnav">
                        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
        
                            <div class="collapse navbar-collapse" id="topnav-menu-content">
                                <ul class="navbar-nav">
                                    <li class="nav-item active">
                                        <a class="nav-link dropdown-toggle arrow-none active" href="{{ url('account') }}" id="topnav-dashboard" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-home-circle icon"></i>
                                            <span data-key="t-dashboard">Account</span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link dropdown-toggle arrow-none" href="{{ url('withdraw_details') }}" id="topnav-dashboard" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-home-circle icon"></i>
                                            <span data-key="t-dashboard">Withdraw Details</span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link dropdown-toggle arrow-none" href="{{ url('ac_statement') }}" id="topnav-dashboard" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-home-circle icon"></i>
                                            <span data-key="t-dashboard">Ac. Statement</span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link dropdown-toggle arrow-none" href="{{ url('depo_statement') }}" id="topnav-dashboard" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-home-circle icon"></i>
                                            <span data-key="t-dashboard">Depo. Statement</span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link dropdown-toggle arrow-none" href="{{ url('with_statement') }}" id="topnav-dashboard" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-home-circle icon"></i>
                                            <span data-key="t-dashboard">With. Statement</span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link dropdown-toggle arrow-none" href="{{ url('help_requests') }}" id="topnav-dashboard" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-home-circle icon"></i>
                                            <span data-key="t-dashboard">Help Requests</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </nav>
                    </div>

                </div>

                <div class="d-flex">
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon" id="page-header-notifications-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-bell icon-sm"></i>
                            <span class="noti-dot bg-danger rounded-pill">3</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                            aria-labelledby="page-header-notifications-dropdown">
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h5 class="m-0 font-size-15"> Notifications </h5>
                                    </div>
                                    <div class="col-auto">
                                        <a href="javascript:void(0);" class="small"> Mark all as read</a>
                                    </div>
                                </div>
                            </div>
                            <div data-simplebar style="max-height: 250px;">
                                <h6 class="dropdown-header bg-light">New</h6>
                                <a href="" class="text-reset notification-item">
                                    <div class="d-flex border-bottom align-items-start">
                                        <div class="flex-shrink-0">
                                            <img src="assets/images/users/avatar-3.jpg"
                                            class="me-3 rounded-circle avatar-sm" alt="user-pic">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">Justin Verduzco</h6>
                                            <div class="text-muted">
                                                <p class="mb-1 font-size-13">Your task changed an issue from "In Progress" to <span class="badgebg-success-subtle text-success">Review</span></p>
                                                <p class="mb-0 font-size-10 text-uppercase fw-bold"><i class="mdi mdi-clock-outline"></i> 1 hours ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="" class="text-reset notification-item">
                                    <div class="d-flex border-bottom align-items-start">
                                        <div class="flex-shrink-0">
                                            <div class="avatar-sm me-3">
                                                <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                    <i class="uil-shopping-basket"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">New order has been placed</h6>
                                            <div class="text-muted">
                                                <p class="mb-1 font-size-13">Open the order confirmation or shipment confirmation.</p>
                                                <p class="mb-0 font-size-10 text-uppercase fw-bold"><i class="mdi mdi-clock-outline"></i> 5 hours ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <h6 class="dropdown-header bg-light">Earlier</h6>
                                <a href="" class="text-reset notification-item">
                                    <div class="d-flex border-bottom align-items-start">
                                        <div class="flex-shrink-0">
                                            <div class="avatar-sm me-3">
                                                <span class="avatar-title bg-success-subtle text-success rounded-circle font-size-16">
                                                    <i class="uil-truck"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">Your item is shipped</h6>
                                            <div class="text-muted">
                                                <p class="mb-1 font-size-13">Here is somthing that you might light like to know.</p>
                                                <p class="mb-0 font-size-10 text-uppercase fw-bold"><i class="mdi mdi-clock-outline"></i> 1 day ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a href="" class="text-reset notification-item">
                                    <div class="d-flex border-bottom align-items-start">
                                        <div class="flex-shrink-0">
                                            <img src="assets/images/users/avatar-4.jpg"
                                                class="me-3 rounded-circle avatar-sm" alt="user-pic">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">Salena Layfield</h6>
                                            <div class="text-muted">
                                                <p class="mb-1 font-size-13">Yay ! Everything worked!</p>
                                                <p class="mb-0 font-size-10 text-uppercase fw-bold"><i class="mdi mdi-clock-outline"></i> 3 days ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2 border-top d-grid">
                                <a class="btn btn-sm btn-link font-size-14 btn-block text-center" href="javascript:void(0)">
                                    <i class="uil-arrow-circle-right me-1"></i> <span>View More..</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item user text-start d-flex align-items-center" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-3.jpg"
                            alt="Header Avatar">
                            <span class="ms-2 d-none d-xl-inline-block user-item-desc">
                                <span class="user-name">{{Auth::user()->username}} <i class="mdi mdi-chevron-down"></i></span>
                            </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end pt-0">
                            <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-account-circle text-muted font-size-16 align-middle me-1"></i> <span class="align-middle">Change Password</span></a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                              <i class="mdi mdi-logout text-muted font-size-16 align-middle me-1"></i>
                              <span class="align-middle"> {{ __('Logout') }} </span>
                            </a>
                            
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="collapse show dash-content" id="dashtoggle">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">


                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <!-- start dash info -->
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card dash-header-box shadow-none border-0">
                                <div class="card-body p-0">
                                    <div class="row row-cols-xxl-4 row-cols-md-3 row-cols-1 g-0">
                                        <div class="col">
                                            <div class="mt-md-0 py-3 px-4 mx-2">
                                                <p class="text-white-50 mb-2 text-truncate">Total Balance </p>
                                                <h3 class="text-white mb-0">197</h3>
                                            </div>
                                        </div><!-- end col -->

                                        <div class="col">
                                            <div class="mt-3 mt-md-0 py-3 px-4 mx-2">
                                                <p class="text-white-50 mb-2 text-truncate">Exchange Balance</p>
                                                <h3 class="text-white mb-0">489</h3>
                                            </div>
                                        </div><!-- end col -->

                                        <div class="col">
                                            <div class="mt-3 mt-md-0 py-3 px-4 mx-2">
                                                <p class="text-white-50 mb-2 text-truncate">Deposit</p>
                                                <h3 class="text-white mb-0">
                                                    <button type="button" class="btn btn-success btn-rounded">Deposit</button>
                                                </h3>
                                            </div>
                                        </div><!-- end col -->

                                        <div class="col">
                                            <div class="mt-3 mt-md-0 py-3 px-4 mx-2">
                                                <p class="text-white-50 mb-2 text-truncate">Withdraw</p>
                                                <h3 class="text-white mb-0">
                                                    <button type="button" class="btn btn-purple btn-rounded">Withdraw</button>
                                                </h3>
                                            </div>
                                        </div><!-- end col -->

                                    </div><!-- end row -->
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                    </div>
                    <!-- end dash info -->
                </div>
            </div>

              <!-- start dash troggle-icon -->
              <div>
                <a class="dash-troggle-icon" id="dash-troggle-icon" data-bs-toggle="collapse" href="#dashtoggle" aria-expanded="true" aria-controls="dashtoggle">
                    <i class="bx bx-up-arrow-alt"></i>
                </a>
            </div>
          <!-- end dash troggle-icon -->

        </header>