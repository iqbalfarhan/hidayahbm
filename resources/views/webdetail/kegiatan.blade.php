@extends('layouts.inner')

@section('content')
@if ($view != "all")
<div class="row">
	<div class="col-md-8">
		<h1 class="mb-0">{{ $datas->judul }}</h1>
		<img src="{{ url($datas->gambar) }}" alt="" class="w-100 rounded shadow-sm my-5">
		<p style="text-indent: 50px!important; text-align: justify;">
			{!! str_replace("<br />", "</p><p style=\"text-indent: 50px; text-align: justify;\">", nl2br($datas->isi)) !!}
			</p>
		</div>
		<div class="col-md-4">
			<div class="">
				<div class="sidebar-links">
					<h4>Kegiatan lainnya</h4>
					<ul class="list-unstyled">
						@foreach (App\Kegiatan::latest()->get() as $kegiatan)
						<li>
							<i class="bx bx-chevron-right"></i>
							<a href="{{ route('guest.kegiatan', $kegiatan->slug) }}">
								{{ $kegiatan->judul }}
							</a>
						</li>
						@endforeach
						<li>
							<i class="bx bx-chevron-right"></i>
							<a href="{{ route('guest.kegiatan') }}">
								Semua Kegiatan
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	@else
	<div class="section-title">
		<h2>Gallery & Kegiatan</h2>
	</div>
	<div class="row" data-masonry='{"percentPosition": true }'>
		@foreach ($datas as $data)
		<div class="col-md-3">
			<div class="card border-0 shadow mb-3">
				<img src="{{ url($data->gambar) }}" alt="" class="card-img-top">
				<div class="card-body">
					<div class="card-title">
						<strong><a href="{{ route('guest.kegiatan', $data->slug) }}">{{ $data->judul }}</a></strong>
					</div>
					<div class="text-truncate">{{ $data->isi }}</div>
					<small class="text-muted">{{ $data->created_at }}</small>
				</div>
			</div>
		</div>
		@endforeach
	</div>
	@endif
	@endsection