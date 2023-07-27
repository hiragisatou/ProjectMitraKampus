<div class="container position-sticky z-index-sticky top-0">
	<div class="row">
		<div class="col-12">
			<!-- Navbar -->
			<nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
				<div class="container-fluid pe-0">
					<a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="{{ route('home') }}">
						Sistem Pengajuan MoU dan Moa
					</a>
					<button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon mt-2">
							<span class="navbar-toggler-bar bar1"></span>
							<span class="navbar-toggler-bar bar2"></span>
							<span class="navbar-toggler-bar bar3"></span>
						</span>
					</button>
					<div class="collapse navbar-collapse" id="navigation">
						<ul class="navbar-nav mx-auto ms-xl-auto me-xl-7">
							<li class="nav-item">
								<a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="{{ route('home') }}">
									<i class="fa fa-home opacity-6 text-dark me-1"></i>
									Home
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link me-2" href="{{ route('aboutUs') }}">
									<i class="fa fa-user opacity-6 text-dark me-1"></i>
									About Us
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link me-2" href="{{ route('contactUs') }}">
									<i class="fa fa-address-book opacity-6 text-dark me-1"></i>
									Contact
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link me-2" href="{{ route('contactUs') }}">
									<i class="fa fa-question-circle opacity-6 text-dark me-1"></i>
									FAQ
								</a>
							</li>
							@if (route('login') == url()->current())
								<li class="nav-item">
									<a class="nav-link me-2" href="{{ route('register') }}">
										<i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
										Sign Up
									</a>
								</li>
							@elseif (route('register') == url()->current())
								<li class="nav-item">
									<a class="nav-link me-2" href="{{ route('login') }}">
										<i class="fas fa-key opacity-6 text-dark me-1"></i>
										Sign In
									</a>
								</li>
							@else
								<li class="nav-item">
									<a class="nav-link me-2" href="{{ route('register') }}">
										<i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
										Sign Up
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link me-2" href="{{ route('login') }}">
										<i class="fas fa-key opacity-6 text-dark me-1"></i>
										Sign In
									</a>
								</li>
							@endif
						</ul>
					</div>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>
	</div>
</div>
