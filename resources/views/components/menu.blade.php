{{-- <h1 class="logo me-auto"><a href="{{ url('/') }}">PT. HBM</a></h1> --}}
<!-- Uncomment below if you prefer to use an image logo -->
<a href="{{ route('web.index') }}" class="logo me-auto"><img src="{{ url(perusahaan('logo')) }}" alt="" class="img-fluid"></a>

<nav id="navbar" class="navbar navbar-light">
	<ul>
		<li><a class="nav-link scrollto active" href="{{ url('/') }}#hero">Home</a></li>
		<li class="dropdown">
			<a href="{{ url('/') }}#"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
			<ul>
				<li><a href="{{ url('/') }}#about" class="scrollto">Kata Pengantar</a></li>
				<li><a href="{{ route('web.profil', 'sejarah') }}">Sejarah Berdiri</a></li>
				<li><a href="{{ route('web.profil', 'visi') }}">Visi & Misi Perusahaan</a></li>
				<li><a href="{{ route('web.profil', 'legalitas') }}">Legalitas & Lisensi</a></li>
				<li><a href="{{ route('web.profil', 'gallery') }}">Gallery Kegiatan</a></li>
				<li><a href="{{ url('/') }}#strorg" class="scrollto">Struktur Organisasi</a></li>
			</ul>
		</li>
		<li><a class="nav-link scrollto" href="{{ url('/') }}#layanan">Layanan</a></li>
		<li><a class="nav-link scrollto" href="{{ url('/') }}#kegiatan">Kegiatan</a></li>
		<li><a class="nav-link scrollto" href="{{ url('/') }}#menuterlaris">Menu Terlaris</a></li>
		<li><a class="nav-link scrollto" href="{{ url('/') }}#kontak">Kontak</a></li>
	</ul>
	<i class="bi bi-list mobile-nav-toggle"></i>
</nav>