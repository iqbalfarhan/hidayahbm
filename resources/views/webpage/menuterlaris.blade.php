<section id="menuterlaris" class="pricing">
	<div class="container" data-aos="fade-up">

		<div class="section-title">
			<h2>Menu terlaris</h2>
		</div>

		<div class="row justify-content-center">

			@foreach (App\Paket::where('terlaris', 1)->get()->take(3) as $paket)
			<div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200">
				<div class="box featured">
					<h3>{{ $paket->nama }}</h3>
					{{-- <h4><sup>Rp</sup>{{ $paket->price }}<span>per pax</span></h4> --}}
					<ul>
						@foreach (json_decode($paket->list_menu) as $menu)
							<li><i class="bx bx-check"></i> {{ $menu }}</li>
						@endforeach
					</ul>
					<a href="{{ route('web.menu', ['paket' => $paket->id]) }}" class="buy-btn">Detail Paket</a>
				</div>
			</div>
			@endforeach

		</div>

		<div class="row">
			<div class="col-md-12 text-center">
				<a href="{{ route('web.menu') }}" class="buy-btn">Lihat {{ App\Paket::count()-3 }} Paket Lainnya</a>
			</div>
		</div>

	</div>
</section>