
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Online Tutor</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="{{ asset('asset/Backend/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('asset/Backend/assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('asset/Backend/assets/css/style.css')}}" rel="stylesheet" type="text/css" />
        @yield('css')
        <script src="{{ asset('asset/Backend/assets/js/modernizr.min.js')}}"></script>

    </head>

    <body>

        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container-fluid">

                    <!-- Logo container-->
                    <div class="logo">

                    </div>
                    <!-- End Logo container-->


                    <div class="menu-extras topbar-custom">

                        <ul class="list-unstyled topbar-right-menu float-right mb-0">

                            <li class="menu-item">
                                <!-- Mobile menu toggle-->
                                <a class="navbar-toggle nav-link">
                                    <div class="lines">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </a>
                                <!-- End mobile menu toggle-->
                            </li>

                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <!-- <img src="assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle"> -->
                                     <span class="ml-1 pro-user-name"> {{ auth::user()->name}}<i class="mdi mdi-chevron-down"></i> </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h6 class="text-overflow m-0">Welcome !</h6>
                                    </div>


                                    <!-- item-->
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="dropdown-item notify-item">
                                        <i class="fi-power"></i> <span>Logout</span>

                                    </a>
                                       <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                       </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- end menu-extras -->

                    <div class="clearfix"></div>

                </div> <!-- end container -->
            </div>
            <!-- end topbar-main -->

            <div class="navbar-custom">
                <div class="container-fluid">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">

                            <li class="has-submenu">
                                <a href="{{ url('/home')}}"><i class="icon-speedometer"></i>Dashboard</a>
                            </li>
                            <li class="has-submenu">
                                <a href="{{route('complain-list')}}"><i class="icon-speedometer"></i>Complain List</a>
                            </li>
                            <li class="has-submenu">
                                <a href="{{route('payment-transaction')}}"><i class="icon-speedometer"></i>Payment Transaction</a>
                            </li>
                        </ul>
                        <!-- End navigation menu -->
                    </div> <!-- end #navigation -->
                </div> <!-- end container -->
            </div> <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->
@yield('student_tutor')





        <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        2022 © All Right Reserved : <b>Online Tutor Finder System</b>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->


        <!-- jQuery  -->
        <script src="{{ asset('asset/Backend/assets/js/jquery.min.js')}}"></script>
        <script src="{{ asset('asset/Backend/assets/js/popper.min.js')}}"></script>
        <script src="{{ asset('asset/Backend/assets/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('asset/Backend/assets/js/waves.js')}}"></script>
        <script src="{{ asset('asset/Backend/assets/js/jquery.slimscroll.js')}}"></script>

        <!-- Flot chart -->
        <script src="{{ asset('asset/Backend/../plugins/flot-chart/jquery.flot.min.js')}}"></script>
        <script src="{{ asset('asset/Backend/../plugins/flot-chart/jquery.flot.time.js')}}"></script>
        <script src="{{ asset('asset/Backend/../plugins/flot-chart/jquery.flot.tooltip.min.js')}}"></script>
        <script src="{{ asset('asset/Backend/../plugins/flot-chart/jquery.flot.resize.js')}}"></script>
        <script src="{{ asset('asset/Backend/../plugins/flot-chart/jquery.flot.pie.js')}}"></script>
        <script src="{{ asset('asset/Backend/../plugins/flot-chart/jquery.flot.crosshair.js')}}"></script>
        <script src="{{ asset('asset/Backend/../plugins/flot-chart/curvedLines.js')}}"></script>
        <script src="{{ asset('asset/Backend/../plugins/flot-chart/jquery.flot.axislabels.js')}}"></script>

        <!-- KNOB JS -->
        @yield('script')
        <!--[if IE]>
        <script type="text/javascript" src="../plugins/jquery-knob/excanvas.js"></script>
        <![endif]-->
        <script src="{{ asset('asset/Backend/../plugins/jquery-knob/jquery.knob.js')}}"></script>

        <!-- Dashboard Init -->
        <script src="{{ asset('asset/Backend/assets/pages/jquery.dashboard.init.js')}}"></script>

        <!-- App js -->
        <script src="{{ asset('asset/Backend/assets/js/jquery.core.js')}}"></script>
        <script src="{{ asset('asset/Backend/assets/js/jquery.app.js')}}"></script>

        @yield('backend_script')

        </body>
        </html>
