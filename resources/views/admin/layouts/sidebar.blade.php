<aside class="sidebar-nav-wrapper">
	<div class="navbar-logo">
		<a href="index.html">
			<img src="{{ asset('dist/img/admin-page/logo.svg') }}" alt="logo" />
		</a>
	</div>
	<nav class="sidebar-nav">
		<ul>
			<li class="nav-item nav-item-has-children">
				<a href="#0" data-bs-toggle="collapse" data-bs-target="#ddmenu_1" aria-controls="ddmenu_1" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon">
						<svg width="22" height="22" viewBox="0 0 22 22">
							<path d="M17.4167 4.58333V6.41667H13.75V4.58333H17.4167ZM8.25 4.58333V10.0833H4.58333V4.58333H8.25ZM17.4167 11.9167V17.4167H13.75V11.9167H17.4167ZM8.25 15.5833V17.4167H4.58333V15.5833H8.25ZM19.25 2.75H11.9167V8.25H19.25V2.75ZM10.0833 2.75H2.75V11.9167H10.0833V2.75ZM19.25 10.0833H11.9167V19.25H19.25V10.0833ZM10.0833 13.75H2.75V19.25H10.0833V13.75Z" />
						</svg>
					</span>
					<span class="text">Dashboard</span>
				</a>
				<ul id="ddmenu_1" class="collapse show dropdown-nav">
					<li>
						<a href="index.html" class="active"> eCommerce </a>
					</li>
				</ul>
			</li>
			<li class="nav-item">
				<a href="invoice.html">
                    <span class="icon">
                        <i class="lni lni-database"></i>
                    </span>
					<span class="text">Daftar Mitra</span>
				</a>
			</li>
            <li class="nav-item">
				<a href="{{ route('PengajuanMoU') }}">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><path d="M128 0C92.7 0 64 28.7 64 64V288H19.2C8.6 288 0 296.6 0 307.2C0 349.6 34.4 384 76.8 384H320V288H128V64H448V96h64V64c0-35.3-28.7-64-64-64H128zM512 128H400c-26.5 0-48 21.5-48 48V464c0 26.5 21.5 48 48 48H592c26.5 0 48-21.5 48-48V256H544c-17.7 0-32-14.3-32-32V128zm32 0v96h96l-96-96z"/></svg>
                    </span>
					<span class="text">Pengajuan MoU</span>
				</a>
			</li>
		</ul>
</aside>
<div class="overlay"></div>
<!-- ======== sidebar-nav end =========== -->
