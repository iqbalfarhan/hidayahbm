@extends('layouts.inner')

@section('content')
<div class="row">
	<div class="col-md-8">
		<img src="{{ url($datas->gambar) }}" alt="" class="w-100 rounded shadow-sm mb-5">
		<p style="text-indent: 50px!important; text-align: justify;">
			{!! str_replace("<br />", "</p><p style=\"text-indent: 50px; text-align: justify;\">", nl2br($datas->isi)) !!}
		</p>
	</div>
	<div class="col-md-4">
		<div class="">
			<div class="sidebar-links">
				<h4>Profil lainnya</h4>
				<ul class="list-unstyled">
					@foreach (App\Profil::all() as $profil)
					<li><i class="bx bx-chevron-right"></i> <a href="{{ route('guest.profil',$profil->slug) }}">{{ $profil->judul }}</a></li>
					@endforeach
				</ul>
			</div>
			<div class="sidebar-links">
				<h4>Lihat juga</h4>
				<ul class="list-unstyled">
					<li><i class="bx bx-chevron-right"></i> <a href="{{ route('guest.legalitas') }}">Legalitas & Lisensi</a></li>
					<li><i class="bx bx-chevron-right"></i> <a href="{{ route('guest.index') }}#strorg">Struktur Organisasi</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
@endsection