<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Ovtimys - Overtime Payment Management System">
  <meta name="author" content="Creative Tim">
  <title>{{ config('app.name') }}</title>
  <link rel="icon" href="{{ url('/argon/img/brand/favicon.png') }}" type="image/png">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <link rel="stylesheet" href="{{ url('/argon/vendor/nucleo/css/nucleo.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ url('/argon/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ url('arsha/vendor/bootstrap-icons/bootstrap-icons.css') }}" type="text/css">
  <!-- Page plugins -->
  <link rel="stylesheet" href="{{ url('/argon/vendor/fullcalendar/dist/fullcalendar.min.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ url('/argon/vendor/sweetalert2/dist/sweetalert2.min.css') }}" type="text/css">

  <link rel="stylesheet" href="{{ url('/argon/css/argon.css?v=1.1.0') }}" type="text/css">
  <link rel="stylesheet" href="{{ url('/argon/css/custom.css') }}" type="text/css">
  @livewireStyles
</head>

<body class="text-sm">
  <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white noprint" id="sidenav-main">
    <div class="scrollbar-inner">
      <div class="sidenav-header d-flex align-items-center">
        <a class="navbar-brand" href="{{ route('home') }}">
          <img src="{{ url(perusahaan('logo') ?? '/argon/img/brand/blue.png') }}" class="navbar-brand-img" alt="{{ config('app.name') }}">
        </a>
        <div class="ml-auto">
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-inner">
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          @if (in_array(auth()->user()->akses, ['finance', 'gudang', 'report', 'view', 'web']))
            @livewire('comp.'.auth()->user()->akses.'menu')
          @endif
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form>
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center ml-md-auto">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            @if (auth()->user()->admin == 1)
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="ni ni-bell-55"></i>
                </a>
                @livewire('comp.notiv-admin')
              </li>
            @endif
            <li class="nav-item">
              <a href="" class="nav-link"><i class="fa fa-globe"></i> Preview web</a>
            </li>
          </ul>
          @livewire('comp.usernav')
        </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6 noprint">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">{{ $title ?? config('app.name') }}</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-user"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Akses {{ auth()->user()->akses }}</a></li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              @if (isset($withNew) && $withNew == true)
              <a href="#create" class="btn btn-sm btn-neutral" data-toggle="modal">New</a>
              @endif
              @if (isset($withFilter) && $withFilter == true)
              <a href="#filter" class="btn btn-sm btn-neutral" data-toggle="modal">Filter</a>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      @yield('content')
      <footer class="footer pt-0 noprint">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center text-lg-left text-muted">
              &copy; {{ date('Y') }} <a href="{{ url('/') }}" class="font-weight-bold ml-1">{{ perusahaan('nama') }}</a>
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="#" class="nav-link">{{ perusahaan('nama') }}</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
      </form>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{ url('/argon/vendor/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ url('/argon/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ url('/argon/vendor/js-cookie/js.cookie.js') }}"></script>
  <script src="{{ url('/argon/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
  <script src="{{ url('/argon/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
  <!-- Optional JS -->
  <script src="{{ url('/argon/vendor/moment/min/moment.min.js') }}"></script>
  <script src="{{ url('/argon/vendor/fullcalendar/dist/fullcalendar.min.js') }}"></script>
  <script src="{{ url('/argon/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
  <!-- Argon JS -->
  <script src="{{ url('/argon/js/argon.js?v=1.1.0') }}"></script>
  <!-- Demo JS - remove this in your project -->
  <script src="{{ url('/argon/js/demo.min.js') }}"></script>

  @stack('js')

  @livewireScripts
  <script>
    window.addEventListener('closeModal', event => {
      $('#'+event.detail.id).modal('hide');
    });

    window.addEventListener('openModal', event => {
      $('#'+event.detail.id).modal('show');
    });

    window.addEventListener('alert', event => {
      alert(event.detail.message);
    });
  </script>
</body>

</html>