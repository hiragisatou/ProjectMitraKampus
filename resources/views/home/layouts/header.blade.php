<header class="p-3 mb-3 border-bottom">
	<div class="container">
		<div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
			<a href="{{ route('home') }}" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
				<svg class="bi me-2 ikon-svg" width="40" height="32" role="img" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
					<path d="M288 0H400c8.8 0 16 7.2 16 16V80c0 8.8-7.2 16-16 16H320.7l89.6 64H512c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H336V400c0-26.5-21.5-48-48-48s-48 21.5-48 48V512H64c-35.3 0-64-28.7-64-64V224c0-35.3 28.7-64 64-64H165.7L256 95.5V32c0-17.7 14.3-32 32-32zm48 240a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM80 224c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V240c0-8.8-7.2-16-16-16H80zm368 16v64c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V240c0-8.8-7.2-16-16-16H464c-8.8 0-16 7.2-16 16zM80 352c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V368c0-8.8-7.2-16-16-16H80zm384 0c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V368c0-8.8-7.2-16-16-16H464z" />
				</svg>
			</a>

			<ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
				<li><a href="{{ route('home') }}" class="nav-link px-2 {{ route('home') == url()->current() ? 'link-dark fw-bold fw-bold bg-opacity-10 bg-secondary' : 'link-body-emphasis' }}">Home</a></li>
				<li><a href="{{ route('aboutUs') }}" class="nav-link px-2 {{ route('aboutUs') == url()->current() ? 'link-dark fw-bold fw-bold bg-opacity-10 bg-secondary' : 'link-body-emphasis' }}">About Us</a></li>
				<li><a href="{{ route('contactUs') }}" class="nav-link px-2 {{ route('contactUs') == url()->current() ? 'link-dark fw-bold fw-bold bg-opacity-10 bg-secondary' : 'link-body-emphasis' }}">Contact</a></li>
				<li><a href="{{ route('FAQ') }}" class="nav-link px-2 {{ route('FAQ') == url()->current() ? 'link-dark fw-bold fw-bold bg-opacity-10 bg-secondary' : 'link-body-emphasis' }}">FAQ</a></li>
			</ul>

			@auth
				<div class="dropdown text-end">
					<a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
						<img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
					</a>
					<ul class="dropdown-menu text-small" style="">
						<li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
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
				</div>
			@endauth
			@guest
				@if (route('login') == url()->current())
					<a href="{{ route('register') }}" class="btn btn-primary">Daftar</a>
				@else
					<a href="{{ route('login') }}" class="btn btn-primary">Masuk</a>
				@endif
			@endguest
		</div>
	</div>
</header>
