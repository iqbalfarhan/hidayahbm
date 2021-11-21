@extends('layouts.auth')

@section('content')
<div class="container mt--8 pb-5">
	<div class="row justify-content-center">
		<div class="col-lg-5 col-md-7">
			<div class="card bg-secondary border-0 mb-0">
				<div class="card-body px-lg-5 py-lg-5">
					<div class="text-center text-muted mb-4">
						@if ($errors->any())
						<b class="text-warning small">{{ $errors->first() }}</b>
						@else
						<small>Masuk menggunakan akun terdaftar</small>
						@endif
					</div>
					<form role="form" action="{{ route('login') }}" method="POST">
						@csrf
						<div class="form-group mb-3">
							<div class="input-group input-group-merge input-group-alternative">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="ni ni-email-83"></i></span>
								</div>
								<input class="form-control @error('username') is-invalid @enderror" placeholder="Username" name="username" type="text" value="{{ old('username') }}" autocomplete="username" autofocus>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group input-group-merge input-group-alternative">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
								</div>
								<input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
							</div>
						</div>
						<div class="custom-control custom-control-alternative custom-checkbox">
							<input class="custom-control-input" id=" customCheckLogin" type="checkbox">
							<label class="custom-control-label" for=" customCheckLogin">
								<span class="text-muted">Ingat saya</span>
							</label>
						</div>
						<div class="text-center">
							<button type="submit" class="btn btn-primary my-4">Masuk</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
