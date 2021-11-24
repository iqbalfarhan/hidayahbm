<section id="about" class="about">
	<div class="container" data-aos="fade-up">
		@php
			$profil = App\Profil::first();
		@endphp

		<div class="section-title">
			<h2>{{ $profil->judul }}</h2>
		</div>

		<div class="row content justify-content-center">
			<div class="col-lg-10">
				<p style="column-count: 2; text-align: justify-all!important;">
					{!! nl2br($profil->isi) !!}
					<br>
					@if ($about = App\Profil::where('slug', 'sejarah-berdiri')->first())
						<a href="{{ route('guest.profil', 'sejarah-berdiri') }}" class="btn-learn-more mt-3">Sejarah berdiri</a>
					@endif
					
				</p>
			</div>
		</div>

	</div>
</section>