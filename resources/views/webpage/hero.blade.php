<section id="hero" class="d-flex align-items-center" style="background-color: {{ perusahaan('warna tema') }};">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
				<h1>{{ perusahaan('nama') }}</h1>
				<h2>{{ perusahaan('slogan') }}</h2>
				<div class="d-flex justify-content-center justify-content-lg-start">
					<a href="#layanan" class="btn-get-started scrollto">Layanan Kami</a>
				</div>
			</div>
			<div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
				<img src="{{ url(perusahaan('ilustrasi') ?? 'arsha/img/hero-img.png') }}" class="img-fluid animated" alt="">
			</div>
		</div>
	</div>
</section>