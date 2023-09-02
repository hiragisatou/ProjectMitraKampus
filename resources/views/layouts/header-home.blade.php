<nav class="navbar navbar-expand-lg bg-white border-bottom">
    <div class="container-fluid">
        <a class="navbar-brand d-flex" href="#">
            <img src="{{ asset('dist/img/logo.png') }}" alt="logo" width="auto" height="32" role="img">
            <h6 class="my-auto ps-2">Sistem Pengajuan MoU & MoA</h6>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 justify-content-center">
                <li><a href="{{ route('home') }}" class="nav-link px-2 {{ route('home') == url()->current() ? 'link-secondary' : 'link-body-emphasis' }}">Home</a></li>
                <li><a href="{{ route('aboutUs') }}" class="nav-link px-2 {{ route('aboutUs') == url()->current() ? 'link-secondary' : 'link-body-emphasis' }}">Tentang Kami</a></li>
                <li><a href="{{ route('contactUs') }}" class="nav-link px-2 {{ route('contactUs') == url()->current() ? 'link-secondary' : 'link-body-emphasis' }}">Kontak</a></li>
                <li><a href="{{ route('FAQ') }}" class="nav-link px-2 {{ route('FAQ') == url()->current() ? 'link-secondary' : 'link-body-emphasis' }}">FAQ</a></li>
            </ul>
            @guest
                <div class="col-md-3 text-end">
                    <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Masuk</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">Daftar</a>
                </div>
            @endguest
            @auth
                <div class="dropdown">
                    <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg-end">
                        <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li><a class="dropdown-item" href="{{ route('view_update_account') }}">Settings</a></li>
                        <li><a class="dropdown-item" href="{{ route('edit_profile') }}">Profile</a></li>
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
                </div>
            @endauth
        </div>
    </div>
</nav>
