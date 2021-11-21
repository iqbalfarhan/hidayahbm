<div>
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link {{ Route::is('home') ? "active" : "" }}" href="{{ route('home') }}">
				<i class="ni ni-circle-08 text-primary"></i>
				<span class="nav-link-text">Dashboard</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#navbar-dashboards" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-dashboards">
				<i class="ni ni-shop text-primary"></i>
				<span class="nav-link-text">Gudang</span>
			</a>
			<div class="collapse show" id="navbar-dashboards">
				<ul class="nav nav-sm flex-column">
					<li class="nav-item">
						<a href="{{ route('barang.index') }}" class="nav-link">
							<span class="sidenav-normal">List barang</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{ route('barang.create') }}" class="nav-link">
							<span class="sidenav-normal">Tambah stok</span>
						</a>
					</li>
				</ul>
			</div>
		</li>
	</ul>
	<hr class="my-3">
	<h6 class="navbar-heading p-0 text-muted">Pengaturan</h6>
	<ul class="navbar-nav mb-md-3">
		<li class="nav-item">
			<a class="nav-link {{ Route::is('user.*') ? "active" : "" }}" href="{{ route('user.index') }}">
				<i class="ni ni-circle-08 text-primary"></i>
				<span class="nav-link-text">Pengaturan User</span>
			</a>
		</li>
	</ul>
</div>
