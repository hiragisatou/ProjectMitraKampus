<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl position-sticky blur shadow-blur mt-4 left-auto top-1 z-index-sticky" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5" id="breadcrumb">

            </ol>
            <h6 class="font-weight-bolder mb-0">@yield('title')</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                {{-- <div class="input-group">
					<span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
					<input type="search" class="form-control" placeholder="Type here..." id="header-search">
				</div> --}}
            </div>
            <ul class="navbar-nav justify-content-end">
                @guest
                    <li class="nav-item d-flex align-items-center me-2">
                        <a href="{{ route('login') }}" class="nav-link text-body font-weight-bold px-0">
                            <span class="d-sm-inline d-none"><i class="fas fa-user-circle opacity-6 text-dark me-1"></i>Sign Up</span>
                        </a>
                    </li>
                    <li class="nav-item d-flex align-items-center me-2">
                        <a href="{{ route('login') }}" class="nav-link text-body font-weight-bold px-0">
                            <span class="d-sm-inline d-none"><i class="fas fa-key opacity-6 text-dark me-1"></i>Sign In</span>
                        </a>
                    </li>
                @endguest
                @auth
                    <li class="nav-item d-flex align-items-center me-2">
                        <span href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                            <span class="d-sm-inline d-none">{{ auth()->user()->name }}</span>
                        </span>
                    </li>
                    <li class="nav-item dropdown pe-2 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end text-small" style="" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="{{ route('home') }}">Home</a></li>
                            @can('mitra')
                                <li><a class="dropdown-item" href="{{ route('edit_profile') }}">Profile</a></li>
                            @endcan
                            <li><a class="dropdown-item" href="{{ route('view_update_account') }}">Pengaturan Akun</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="{{ route('logout_handler') }}" class="p-0 m-0" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Keluar</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
