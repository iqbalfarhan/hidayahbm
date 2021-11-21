<section id="about" class="about">
	<div class="container" data-aos="fade-up">

		<div class="section-title">
			<h2>Kata Pengantar</h2>
		</div>

		<div class="row content justify-content-center">
			<div class="col-lg-10">
				<p style="column-count: 2; text-align: justify-all!important;">
					@if ($about = App\Profil::where('slug', 'kata-pengantar')->first())
						{!! nl2br($about->isi) !!}
					@endif
					<br>
					@if ($about = App\Profil::where('slug', 'sejarah-berdiri')->first())
						<a href="{{ route('web.profil', 'sejarah-berdiri') }}" class="btn-learn-more mt-3">Sejarah berdiri</a>
					@endif
					
				</p>
			</div>
		</div>

	</div>
</section>