<section id="layanan" class="services section-bg">
	<div class="container" data-aos="fade-up">

		<div class="section-title">
			<h2>Layanan</h2>
		</div>

		<div class="row justify-content-center">
			@foreach (App\Layanan::all() as $layanan)
			<div class="col-xl-3 col-md-6 mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
				<div class="icon-box">
					<div class="icon"><i class="{{ $layanan->icon }}"></i></div>
					<h4><a href="">{{ $layanan->nama }}</a></h4>
					<p class="text-truncate">{{ $layanan->keterangan }}</p>
				</div>
			</div>
			@endforeach

		</div>

	</div>
</section>