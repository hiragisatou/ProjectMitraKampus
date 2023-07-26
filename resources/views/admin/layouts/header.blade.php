<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl position-sticky blur shadow-blur mt-4 left-auto top-1 z-index-sticky" id="navbarBlur" navbar-scroll="true">
	<div class="container-fluid py-1 px-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
				<li class="breadcrumb-item text-sm">
					@if (route('dashboard') == url()->current())
					@else
						<a class="opacity-5 text-dark" href="{{ route('dashboard') }}">Dashboard</a>
					@endif
				</li>
				<li class="breadcrumb-item text-sm text-dark active" aria-current="page">
					@if (route('viewListPengajuan') == url()->current())
						Daftar Pengajuan
					@elseif (route('viewListMitra') == url()->current())
						Daftar Mitra
					@elseif (route('PengajuanMoU') == url()->current())
						Pengajuan MoU
					@endif
				</li>
			</ol>
			<h6 class="font-weight-bolder mb-0">@yield('title')</h6>
		</nav>
		<div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
			<div class="ms-md-auto pe-md-3 d-flex align-items-center">
				<div class="input-group">
					<span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
					<input type="search" class="form-control" placeholder="Type here..." id="header-search">
				</div>
			</div>
			<ul class="navbar-nav justify-content-end">
				<li class="nav-item d-flex align-items-center me-2">
					<a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
						<span class="d-sm-inline d-none">{{ auth()->user()->name }}</span>
					</a>
				</li>
				<li class="nav-item dropdown pe-2 d-flex align-items-center">
					<a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
						<img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
					</a>
					<ul class="dropdown-menu dropdown-menu-end text-small" style="" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="{{ route('home') }}">Home</a></li>
                        <li><a class="dropdown-item" href="{{ route('editProfile') }}">Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('updateAkun') }}">Pengaturan Akun</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form action="{{ route('logoutHandler') }}" class="p-0 m-0" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item">Keluar</button>
                            </form>
                        </li>
                    </ul>
				</li>
			</ul>
		</div>
	</div>
</nav>
<!-- End Navbar -->
