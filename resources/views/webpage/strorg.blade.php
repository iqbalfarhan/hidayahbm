<section id="strorg" class="team section-bg">
	<div class="container" data-aos="fade-up">

		<div class="section-title">
			<h2>Struktur Organisasi</h2>
		</div>

		<div class="row">
			@foreach (App\Organisasi::all() as $strorg)
			<div class="col-lg-6">
				<div class="member d-flex align-items-start mb-3" data-aos="zoom-in" data-aos-delay="100">
					<div class="pic"><img src="{{ url($strorg->gambar) }}" class="img-fluid" alt=""></div>
					<div class="member-info">
						<h4>{{ $strorg->nama }}</h4>
						<span>{{ $strorg->jabatan }}</span>
						<p>Hp : {{ $strorg->telp }}</p>
						<div class="social">
							<a href=""><i class="ri-whatsapp-fill"></i></a>
							<a href=""><i class="ri-phone-fill"></i></a>
						</div>
					</div>
				</div>
			</div>
			@endforeach

		</div>

	</div>
</section>