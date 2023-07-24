<aside class="sidebar-nav-wrapper">
	<div class="navbar-logo">
		<a href="index.html">
			<img src="{{ asset('dist/img/admin-page/logo.svg') }}" alt="logo" />
		</a>
	</div>
	<nav class="sidebar-nav">
		<ul>
            <li class="nav-item {{ route('dashboard') == url()->current() ? 'active' : '' }}">
				<a href="{{ route('dashboard') }}">
                    <span class="icon">
						<svg width="22" height="22" viewBox="0 0 22 22">
							<path d="M17.4167 4.58333V6.41667H13.75V4.58333H17.4167ZM8.25 4.58333V10.0833H4.58333V4.58333H8.25ZM17.4167 11.9167V17.4167H13.75V11.9167H17.4167ZM8.25 15.5833V17.4167H4.58333V15.5833H8.25ZM19.25 2.75H11.9167V8.25H19.25V2.75ZM10.0833 2.75H2.75V11.9167H10.0833V2.75ZM19.25 10.0833H11.9167V19.25H19.25V10.0833ZM10.0833 13.75H2.75V19.25H10.0833V13.75Z" />
						</svg>
					</span>
					<span class="text">Dashboard</span>
				</a>
			</li>
            @can('admin')
			<li class="nav-item {{ route('viewListMitra') == url()->current() ? 'active' : '' }}">
				<a href="{{ route('viewListMitra') }}">
                    <span class="icon">
                        <i class="lni lni-database"></i>
                    </span>
					<span class="text">Daftar Mitra</span>
				</a>
			</li>
            @endcan
            <li class="nav-item {{ route('viewListPengajuan') == url()->current() ? 'active' : '' }}">
				<a href="{{ route('viewListPengajuan') }}">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><path d="M24 56c0-13.3 10.7-24 24-24H80c13.3 0 24 10.7 24 24V176h16c13.3 0 24 10.7 24 24s-10.7 24-24 24H40c-13.3 0-24-10.7-24-24s10.7-24 24-24H56V80H48C34.7 80 24 69.3 24 56zM86.7 341.2c-6.5-7.4-18.3-6.9-24 1.2L51.5 357.9c-7.7 10.8-22.7 13.3-33.5 5.6s-13.3-22.7-5.6-33.5l11.1-15.6c23.7-33.2 72.3-35.6 99.2-4.9c21.3 24.4 20.8 60.9-1.1 84.7L86.8 432H120c13.3 0 24 10.7 24 24s-10.7 24-24 24H32c-9.5 0-18.2-5.6-22-14.4s-2.1-18.9 4.3-25.9l72-78c5.3-5.8 5.4-14.6 .3-20.5zM224 64H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H224c-17.7 0-32-14.3-32-32s14.3-32 32-32zm0 160H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H224c-17.7 0-32-14.3-32-32s14.3-32 32-32zm0 160H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H224c-17.7 0-32-14.3-32-32s14.3-32 32-32z"/></svg>
                    </span>
					<span class="text">Daftar Pengajuan</span>
				</a>
			</li>
            <li class="nav-item {{ route('PengajuanMoU') == url()->current() ? 'active' : '' }}">
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
