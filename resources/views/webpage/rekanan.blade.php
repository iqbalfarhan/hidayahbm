<section id="cliens" class="cliens section-bg">
	<div class="container">

		<div class="row justify-content-center" data-aos="zoom-in">

			@foreach (App\Rekanan::get() as $rekan)
			<div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center" title="{{ $rekan->nama }}" data-toggle="tooltip">
				<img src="{{ url($rekan->gambar) }}" class="img-fluid">
			</div>
			@endforeach

		</div>

	</div>
</section>