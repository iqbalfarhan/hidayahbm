@extends('layouts.inner')

@section('content')

<div class="section-title">
	<h2>{{ $title }}</h2>
</div>

<p>Seiring dengan nya peningkata pembangunan di indonesia dan kemajuan teknologi, maka banyak perumahan, pabrik, tambang yang berusaha memanfaatkan peluang usaha. Oleh karna itu demi menjaga asa dalam peluang usaha kami juga melakukan prosedur keselamatan maupun birokrasi yang diinginkan oleh pihak pemerintahan mengenai hal legalitas dan lisensi</p>
<p>berikut adalah bukti kami meningkatkan kualitas kami dalam berusaha!</p>
<div class="row" data-masonry='{"percentPosition": true }'>
	@foreach ($datas as $data)
	<div class="col-md-3">
		<div class="card border-0 shadow-sm mb-4">
			<img src="{{ url($data->gambar) }}" alt="" class="card-img-top">
			<div class="card-body">
				<div class="card-title text-sm">
					{{ $data->nama }}
				</div>
			</div>
		</div>
	</div>
	@endforeach
</div>
@endsection