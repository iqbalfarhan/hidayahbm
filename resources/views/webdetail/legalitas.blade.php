@extends('layouts.inner')

@section('content')
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
@endsection