<section id="menuterlaris" class="pricing">
	<div class="container" data-aos="fade-up">

		<div class="section-title">
			<h2>Menu terlaris</h2>
			<p>Berikut adalah sample menu yang biasa kami tawarkan kepada konsumen, MENU TIDAK MENETAP akan ada roling nya secara berkala dan tergantung dengan permintaan mitra kerja kami.</p>
		</div>

		<div class="row justify-content-center">

			@foreach (App\Paket::where('terlaris', 1)->get()->take(3) as $paket)
			<div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200">
				<div class="box featured">
					<h3>{{ $paket->nama }}</h3>
					<div class="text-center">
						<img src="{{ $paket->gambar }}" alt="" class="avatar w-100 rounded shadow">
					</div>
					<ul>
						@foreach (json_decode($paket->list_menu) as $menu)
							<li><i class="bx bx-check"></i> {{ $menu }}</li>
						@endforeach
					</ul>
					<a href="{{ route('guest.menu', ['paket' => $paket->id]) }}" class="buy-btn">Detail Paket</a>
				</div>
			</div>
			@endforeach

		</div>

		<div class="row">
			<div class="col-md-12 text-center">
				<a href="{{ route('guest.menu') }}" class="buy-btn">Lihat Paket Lainnya</a>
			</div>
		</div>

	</div>
</section>