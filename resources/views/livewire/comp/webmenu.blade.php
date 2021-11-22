<div>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link {{ Route::is('home') ? "active" : "" }}" href="{{ route('home') }}">
                <i class="ni ni-spaceship text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#navbar-dashboards" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-dashboards">
                <i class="ni ni-badge text-primary"></i>
                <span class="nav-link-text">Profile Perusahaan</span>
            </a>
            <div class="collapse {{ Route::is(['web.profil.*', 'web.layanan']) ? "show active" : "" }}" id="navbar-dashboards">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a href="{{ route('web.profil.index') }}" class="nav-link {{ Route::is('web.profil.index') ? "active" : "" }}">
                            <span class="sidenav-normal">Profil Perusahaan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('web.profil.strorg') }}" class="nav-link {{ Route::is('web.profil.strorg') ? "active" : "" }}">
                            <span class="sidenav-normal">Struktur Organisasi</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('web.layanan') }}" class="nav-link {{ Route::is('web.layanan') ? "active" : "" }}">
                            <span class="sidenav-normal">Layanan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('web.profil.rekanan') }}" class="nav-link {{ Route::is('web.profil.rekanan') ? "active" : "" }}">
                            <span class="sidenav-normal">Perusahaan Rekanan</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="ni ni-paper-diploma text-primary"></i>
                <span class="nav-link-text">Legalitas & Lisensi</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('web.galeri') }}">
                <i class="fa fa-folder text-primary"></i>
                <span class="nav-link-text">File Manager</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('web.kegiatan') }}">
                <i class="ni ni-calendar-grid-58 text-primary"></i>
                <span class="nav-link-text">Kegiatan & Acara</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('web.paket') }}">
                <i class="ni ni-books text-primary"></i>
                <span class="nav-link-text">Paket Makanan</span>
            </a>
        </li>
    </ul>
</div>
