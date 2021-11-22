<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ perusahaan('nama') }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ url('arsha/img/favicon.png') }}" rel="icon">
  <link href="{{ url('arsha/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ url('arsha/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ url('arsha/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ url('arsha/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ url('arsha/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ url('arsha/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ url('arsha/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ url('arsha/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ url('arsha/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Arsha - v4.6.0
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <x-menu></x-menu>
    </div>
  </header>
  @include('webpage.hero')

  <main id="main">
    <!-- ======= Cliens Section ======= -->
    @include('webpage.rekanan')
    <!-- End Cliens Section -->

    <!-- ======= About Us Section ======= -->
    @include('webpage.about')
    <!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    @include('webpage.layanan')
    <!-- End Services Section -->

    <!-- ======= Cta Section ======= -->
    @include('webpage.cta')
    <!-- End Cta Section -->

    <!-- ======= Portfolio Section ======= -->
    @include('webpage.kegiatan')
    <!-- End Portfolio Section -->

    <!-- ======= Team Section ======= -->
    @include('webpage.strorg')
    <!-- End Team Section -->

    <!-- ======= Pricing Section ======= -->
    @include('webpage.menuterlaris')
    <!-- End Pricing Section -->

    <!-- ======= Contact Section ======= -->
    @include('webpage.kontak')
    <!-- End Contact Section -->

  </main><!-- End #main -->

  <x-footer></x-footer>

  <div id="preloader"></div>
  <a href="https://api.whatsapp.com/send?phone=+628999779527&text=Hallo, saya ingin bertanya." class="whatsapp-button d-flex align-items-center justify-content-center"><i class="bi bi-whatsapp"></i></a>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ url('arsha/vendor/aos/aos.js') }}"></script>
  <script src="{{ url('arsha/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ url('arsha/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ url('arsha/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ url('arsha/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ url('arsha/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ url('arsha/vendor/waypoints/noframework.waypoints.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ url('arsha/js/main.js') }}"></script>

</body>

</html>