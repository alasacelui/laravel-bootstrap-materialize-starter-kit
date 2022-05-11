<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title', 'Admin | Dashboard')</title>
    @include('layouts.admin.styles')
</head>

<body class="g-sidenav-show bg-gray-200 ">
    @include('layouts.admin.modal')
    {{-- Aside --}}
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0  fixed-start  bg-dark" id="sidenav-main">
        <div class="p-5 text-center text-white bg-dark">
            <img class="img-fluid d-block mx-auto rounded-circle" src="{{ asset('img/noimg.svg') }}" width="100"
                alt="">
            <br>
            <small>Administrator</small>
        </div>
        <div class="collapse navbar-collapse  w-auto max-height-vh-100 bg-dark" id="sidenav-collapse-main">

            <ul class="navbar-nav">
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Main Menu</h6>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('admin.dashboard.index') }}" id="dashboard_nav">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link collapsed" id="dropdownMenuButton"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">edit</i>
                        </div>
                        <span class="align-middle">Sample Dropdown</span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="#">Item I</a></li>
                        <li><a class="dropdown-item" href="#">Item II</a></li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a class="nav-link text-white " href="{{ route('admin.category.index') }}" id="auth_nav">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">group</i>
                        </div>
                        <span class="nav-link-text ms-1">Category</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white " href="{{ route('admin.user.index') }}" id="auth_nav">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">group</i>
                        </div>
                        <span class="nav-link-text ms-1">Manage User</span>
                    </a>
                </li>


                {{-- 3rd Items --}}
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">others</h6>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white " href="{{ route('profile.index') }}" id="profile_nav">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">person</i>
                        </div>
                        <span class="nav-link-text ms-1">Profile</span>
                    </a>
                </li>

            </ul>
        </div>
        <div class="sidenav-footer position-absolute w-100 bottom-0 ">

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

            <div class="mx-3">
                <a class="btn bg-primary mt-4 w-100 text-white" href="{{ route('logout') }}" type="button"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
            </div>
        </div>
    </aside>
    {{-- End Side Nav --}}
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <h6 class="font-weight-bolder mb-0">Dashboard</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">

                    </div>
                    <ul class="navbar-nav  justify-content-end">

                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:void(0)" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                        {{-- Print --}}
                        <li class="nav-item d-flex align-items-center">
                            {{-- <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                <i class="fas fa-print mx-2 fa-lg"></i>
              </a> --}}
                        </li>
                        {{-- Logout --}}
                        <li class="nav-item d-flex align-items-center">
                            <a href="{{ route('logout') }}" class="nav-link text-body font-weight-bold px-0"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt mx-2 fa-lg"></i>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        @yield('content')
        <br>
    </main>
    @routes
    @include('layouts.admin.scripts')
    <script src="{{ asset('assets/js/admin/script.js') }}"></script>
    @yield('script')
</body>

</html>
