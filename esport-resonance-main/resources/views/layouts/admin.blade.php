<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Laravel SB Admin 2">
    <meta name="author" content="Alejandro RH">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.png') }}" rel="icon" type="image/png">

    @stack('css')
</head>
<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #2B2B2B;">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-dice-d6"></i>
            </div>
            <div class="sidebar-brand-text mx-3">{{ config('app.name', 'Laravel') }}</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ Nav::isRoute('home') }}">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>{{ __('Dashboard') }}</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            {{ __('Settings') }}
        </div>

        <!-- Nav Item - Profile -->
        <li class="nav-item {{ Nav::isRoute('profile') }}">
            <a class="nav-link" href="{{ route('profile') }}">
                <i class="fas fa-fw fa-list"></i>
                <span>{{ __('Profile') }}</span>
            </a>
        </li>

        @can('admin')

        <!-- Nav Item -->
        <li class="nav-item {{ Nav::isRoute('user.index') }}">
            <a class="nav-link" href="{{ route('user.index') }}">
                <i class="fas fa-fw fa-list"></i>
                <span>{{ __('Users') }}</span>
            </a>
        </li>

        <!-- Nav Item -->
        <li class="nav-item {{ Nav::isRoute('news.category') }}">
            <a class="nav-link" href="{{ route('news.category') }}">
                <i class="fas fa-fw fa-list"></i>
                <span>{{ __('News Categories') }}</span>
            </a>
        </li>

        <!-- Nav Item -->
        <li class="nav-item {{ Nav::isRoute('news.index') }}">
            <a class="nav-link" href="{{ route('news.index') }}">
                <i class="fas fa-fw fa-list"></i>
                <span>{{ __('News') }}</span>
            </a>
        </li>

        <!-- Nav Item -->
        <li class="nav-item {{ Nav::isRoute('team.index') }}">
            <a class="nav-link" href="{{ route('team.index') }}">
                <i class="fas fa-fw fa-list"></i>
                <span>{{ __('Teams') }}</span>
            </a>
        </li>

        <!-- Nav Item -->
        {{-- <li class="nav-item {{ Nav::isRoute('team.member') }}">
            <a class="nav-link" href="{{ route('team.member') }}">
                <i class="fas fa-fw fa-list"></i>
                <span>{{ __('Team Members') }}</span>
            </a>
        </li> --}}

        <!-- Nav Item -->
        <li class="nav-item {{ Nav::isRoute('broadcast.index') }}">
            <a class="nav-link" href="{{ route('broadcast.index') }}">
                <i class="fas fa-fw fa-list"></i>
                <span>{{ __('Broadcasts') }}</span>
            </a>
        </li>

        <!-- Nav Item -->
        <li class="nav-item {{ Nav::isRoute('match.group') }}">
            <a class="nav-link" href="{{ route('match.group') }}">
                <i class="fas fa-fw fa-list"></i>
                <span>{{ __('Match Groups') }}</span>
            </a>
        </li>

        <!-- Nav Item -->
        <li class="nav-item {{ Nav::isRoute('match.round') }}">
            <a class="nav-link" href="{{ route('match.round') }}">
                <i class="fas fa-fw fa-list"></i>
                <span>{{ __('Match Rounds') }}</span>
            </a>
        </li>

        <!-- Nav Item -->
        <li class="nav-item {{ Nav::isRoute('match.upcoming') }}">
            <a class="nav-link" href="{{ route('match.upcoming') }}">
                <i class="fas fa-fw fa-list"></i>
                <span>{{ __('Upcoming Matches') }}</span>
            </a>
        </li>

        <!-- Nav Item -->
        <li class="nav-item {{ Nav::isRoute('match.live') }}">
            <a class="nav-link" href="{{ route('match.live') }}">
                <i class="fas fa-fw fa-list"></i>
                <span>{{ __('Live Matches') }}</span>
            </a>
        </li>

        <!-- Nav Item -->
        <li class="nav-item {{ Nav::isRoute('match.index') }}">
            <a class="nav-link" href="{{ route('match.index') }}">
                <i class="fas fa-fw fa-list"></i>
                <span>{{ __('Finished Matches') }}</span>
            </a>
        </li>

        <!-- Nav Item -->
        <li class="nav-item {{ Nav::isRoute('store.category') }}">
            <a class="nav-link" href="{{ route('store.category') }}">
                <i class="fas fa-fw fa-shopping-cart"></i>
                <span>{{ __('Merchandise Categories') }}</span>
            </a>
        </li>

        <!-- Nav Item -->
        <li class="nav-item {{ Nav::isRoute('store.index') }}">
            <a class="nav-link" href="{{ route('store.index') }}">
                <i class="fas fa-fw fa-shopping-cart"></i>
                <span>{{ __('Merchandise') }}</span>
            </a>
        </li>

        <!-- Nav Item -->
        <li class="nav-item {{ Nav::isRoute('mycart.admin') }}">
            <a class="nav-link" href="{{ route('mycart.admin') }}">
                <i class="fas fa-fw fa-shopping-cart"></i>
                <span>{{ __('Carts') }}</span>
            </a>
        </li>

        <!-- Nav Item -->
        <li class="nav-item {{ Nav::isRoute('mycart.methods') }}">
            <a class="nav-link" href="{{ route('mycart.methods') }}">
                <i class="fas fa-fw fa-dollar-sign"></i>
                <span>{{ __('Payment Methods') }}</span>
            </a>
        </li>

        <!-- Nav Item -->
        <li class="nav-item {{ Nav::isRoute('mycart.confirmation') }}">
            <a class="nav-link" href="{{ route('mycart.confirmation') }}">
                <i class="fas fa-fw fa-dollar-sign"></i>
                <span>{{ __('Payment Confirmation') }}</span>
            </a>
        </li>

        @endcan

        @can('member')
        <!-- Nav Item -->
        <li class="nav-item {{ Nav::isRoute('team.team') }}">
            <a class="nav-link" href="{{ route('team.team') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>{{ __('Team') }}</span>
            </a>
        </li>
        <!-- Nav Item -->
        <li class="nav-item {{ Nav::isRoute('mycart.index') }}">
            <a class="nav-link" href="{{ route('mycart.index') }}">
                <i class="fas fa-fw fa-shopping-cart"></i>
                <span>{{ __('My Carts') }}</span>
            </a>
        </li>
        @endcan

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                            <figure class="img-profile rounded-circle avatar font-weight-bold" data-initial="{{ Auth::user()->name[0] }}"></figure>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{ route('profile') }}">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                {{ __('Profile') }}
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                {{ __('Logout') }}
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                @stack('notif')
                @yield('main-content')

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; {{ config('app.name', 'Laravel') }} {{ date('Y') }}</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('Ready to Leave?') }}</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-link" type="button" data-dismiss="modal">{{ __('Cancel') }}</button>
                <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
@stack('js')
</body>
</html>
