@extends('layouts.inner')

@section('content')
<div class="pricing">
	@if ($view == "single")
	<div class="row">
		<div class="col-md-8">
			<h4 class="">{{ $datas->nama }}</h4>
			<div class="row">
				<div class="col-md-6">
					<img src="{{ url($datas->gambar) }}" alt="" class="w-100 rounded">
				</div>
				<div class="col-md-6">
					<ul>
						@foreach (json_decode($datas->list_menu) as $menu)
						<li><i class="bx bx-check"></i> {{ $menu }}</li>
						@endforeach
					</ul>
				</div>
			</div>

			<button class="btn btn-success"><i class="bx bx-whatsapp mr-2"></i>Tanya tentang paket</button>
		</div>
		<div class="col-md-4">
			<h5 class="">Menu lainnya :</h5>
			<div class="list-group">
				@foreach (App\Paket::all() as $paket)
				<a href="{{ route('web.menu', ['paket' => $paket->id]) }}" class="list-group-item">{{ $paket->nama }}</a>
				@endforeach
			</div>
		</div>
	</div>
	@endif

	@if ($view == "all")
	<div class="row">
		@foreach ($datas as $paket)
		<div class="col-lg-4 mt-4 mt-lg-0 mb-4" data-aos="fade-up" data-aos-delay="200">
			<div class="box {{ $paket->terlaris == 1 ? "featured" : "" }}">
				<h3>{{ $paket->nama }}</h3>
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
	@endif
</div>
@endsection