<div>
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link {{ Route::is('home') ? "active" : "" }}" href="{{ route('home') }}">
				<i class="fas fa-briefcase text-primary"></i>
				<span class="nav-link-text">Dashboard</span>
			</a>
		</li>
	</ul>

	<h6 class="navbar-heading p-0 text-muted mt-3">Bahan makanan</h6>
	<ul class="navbar-nav mb-md-3">
		<li class="nav-item">
			<a class="nav-link {{ Route::is('barang.index') ? "active" : "" }}" href="{{ route('barang.index') }}">
				<i class="ni ni-books text-primary"></i>
				<span class="nav-link-text">Database Bahan</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link {{ Route::is('barang.transaksi') ? "active" : "" }}" href="{{ route('barang.transaksi') }}">
				<i class="ni ni-basket text-primary"></i>
				<span class="nav-link-text">Transaksi Bahan</span>
			</a>
		</li>
		{{-- <li class="nav-item">
			<a class="nav-link {{ Route::is('barang.transaksi') ? "active" : "" }}" href="{{ route('barang.transaksi', ['jenis' => 'kurang']) }}">
				<i class="ni ni-box-2 text-primary"></i>
				<span class="nav-link-text">Bahan Keluar</span>
			</a>
		</li> --}}
		<li class="nav-item">
			<a class="nav-link {{ Route::is('transaksi.index') ? "active" : "" }}" href="{{ route('transaksi.index') }}">
				<i class="ni ni-archive-2 text-primary"></i>
				<span class="nav-link-text">Riwayat Transaksi</span>
			</a>
		</li>
	</ul>

	<h6 class="navbar-heading p-0 text-muted mt-3">Aset peralatan</h6>
	<ul class="navbar-nav mb-md-3">
		<li class="nav-item">
			<a class="nav-link {{ Route::is('alat.index') ? "active" : "" }}" href="{{ route('alat.index') }}">
				<i class="ni ni-books text-primary"></i>
				<span class="nav-link-text">Database Alat</span>
			</a>
		</li>
	</ul>

	<h6 class="navbar-heading p-0 text-muted mt-3">Dokumentasi</h6>
	<ul class="navbar-nav mb-md-3">
		<li class="nav-item">
			<a class="nav-link {{ Route::is('dokumentasi') ? "active" : "" }}" href="{{ route('dokumentasi', 'gudang') }}">
				<i class="ni ni-book-bookmark text-primary"></i>
				<span class="nav-link-text">Panduan user</span>
			</a>
		</li>
	</ul>
</div>
