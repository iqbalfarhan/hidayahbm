@extends('layouts.inner')

@section('content')
	<div class="row">
		<div class="col-md-8">
			<div class="card shadow">
				<div class="card-header border-0">
					<div class="row align-items-center">
						<div class="col">
							<h3 class="mb-0">{{ $datas->judul }}</h3>
						</div>
						<div class="col text-right">
							<a href="#!" class="btn btn-sm btn-primary">Create New</a>
						</div>
					</div>
				</div>
				<div class="card-body">
					{!! nl2br($datas->isi) !!}
				</div>
			</div>
		</div>
		<div class="col-md-4">
			Profil lainnnya:
		</div>
	</div>
@endsection