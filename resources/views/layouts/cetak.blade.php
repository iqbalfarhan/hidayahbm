<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
	<meta name="author" content="Creative Tim">
	<title>{{ config('app.name') }}</title>
	<link rel="icon" href="{{ url('/argon/img/brand/favicon.png') }}" type="image/png">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
	<link rel="stylesheet" href="{{ url('/argon/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">

	<link rel="stylesheet" href="{{ url('/argon/css/argon.css?v=1.1.0') }}" type="text/css">
	<link rel="stylesheet" href="{{ url('/argon/css/custom.css') }}" type="text/css">
</head>
<body>
	<div class="container">
		<div class="row my-4">
			<div class="col-md-6">
				<img src="{{ url('/argon/img/brand/blue.png') }}" alt="dfads" style="height: 30pt;">
			</div>
			<div class="col-md-6 text-right">
				{{ date('d/m/Y') }}
			</div>
		</div>
		@yield('content')
	</div>

	<script>
		window.addEventListener('load', function () {
			print();
		})
	</script>
</body>
</html>