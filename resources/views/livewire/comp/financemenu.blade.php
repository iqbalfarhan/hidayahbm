<div>
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link {{ Route::is('home') ? "active" : "" }}" href="{{ route('home') }}">
				<i class="ni ni-spaceship text-primary"></i>
				<span class="nav-link-text">Dashboard</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link {{ Route::is('finance.pemasukan.index') ? "active" : "" }}" href="{{ route('finance.pemasukan.index') }}">
				<i class="ni ni-paper-diploma text-primary"></i>
				<span class="nav-link-text">Pemasukan</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link {{ Route::is('finance.pengeluaran.index') ? "active" : "" }}" href="{{ route('finance.pengeluaran.index') }}">
				<i class="ni ni-paper-diploma text-primary"></i>
				<span class="nav-link-text">Pengeluaran</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link {{ Route::is('finance.pinjaman.index') ? "active" : "" }}" href="{{ route('finance.pinjaman.index') }}">
				<i class="ni ni-money-coins text-primary"></i>
				<span class="nav-link-text">Pinjaman Dana</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link {{ Route::is('finance.transaksi.index') ? "active" : "" }}" href="{{ route('finance.transaksi.index') }}">
				<i class="ni ni-paper-diploma text-primary"></i>
				<span class="nav-link-text">Riwayat Transaksi</span>
			</a>
		</li>
	</ul>
	<hr class="my-3">
	<h6 class="navbar-heading p-0 text-muted">Pengaturan</h6>
	<ul class="navbar-nav mb-md-3">
		<li class="nav-item">
			<a class="nav-link {{ Route::is('profile') ? "active" : "" }}" href="{{ route('profile') }}">
				<i class="ni ni-satisfied text-primary"></i>
				<span class="nav-link-text">Edit Profile</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link {{ Route::is('user.*') ? "active" : "" }}" href="{{ route('user.index') }}">
				<i class="ni ni-circle-08 text-primary"></i>
				<span class="nav-link-text">Pengaturan User</span>
			</a>
		</li>
	</ul>
</div>
