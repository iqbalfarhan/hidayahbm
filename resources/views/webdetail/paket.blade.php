@extends('layouts.inner')

@section('content')
@if ($view == "single")
<div class="section-title">
	<h2>{{ $datas->nama }}</h2>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="row">
			<div class="col-md-6">
				<img src="{{ url($datas->gambar) }}" alt="" class="w-100 rounded shadow">
			</div>
			<div class="col-md-6">
				<b>Menu dalam tiap paket</b>
				<ul class="list-unstyled">
					@foreach (json_decode($datas->list_menu) as $menu)
					<li><i class="bx bx-check"></i> {{ $menu }}</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="">
			<div class="sidebar-links">
				<h4>Paket menu lainnya</h4>
				<ul class="list-unstyled">
					@foreach (App\Paket::all() as $paket)
					<li><i class="bx bx-chevron-right"></i> <a href="{{ route('guest.menu',$paket->slug) }}">{{ $paket->nama }}</a></li>
					@endforeach
					<li><i class="bx bx-chevron-right"></i> <a href="{{ route('guest.menu') }}">Semua paket menu</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
@endif

@if ($view == "all")
<div class="pricing">
	<div class="section-title">
		<h2>Contoh paket</h2>
	</div>
	<div class="row">
		@foreach ($datas as $paket)
		<div class="col-lg-4 mt-4 mt-lg-0 mb-4" data-aos="fade-up" data-aos-delay="200">
			<div class="box {{ $paket->terlaris == 1 ? "featured" : "" }}">
				<h3>{{ $paket->nama }}</h3>
				<img src="{{ url($paket->gambar) }}" alt="" class="w-100 rounded shadow">
				<ul>
					@foreach (json_decode($paket->list_menu) as $menu)
					<li><i class="bx bx-check"></i> {{ $menu }}</li>
					@endforeach
				</ul>
				<a href="{{ route('guest.menu', $paket->slug) }}" class="buy-btn">Detail Paket</a>
			</div>
		</div>
		@endforeach
	</div>
</div>
@endif
@endsection