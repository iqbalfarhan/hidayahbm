<section id="kontak" class="contact section-bg">
	<div class="container" data-aos="fade-up">

		<div class="section-title">
			<h2>Kontak kami</h2>
		</div>

		<div class="row">

			<div class="col-lg-5 d-flex align-items-stretch">
				<div class="info">
					@if (perusahaan('alamat'))
					<div class="address">
						<i class="bi bi-geo-alt"></i>
						<h4>Alamat :</h4>
						<p>{{ perusahaan('alamat') }}</p>
					</div>
					@endif

					@if (perusahaan('email'))
					<div class="email">
						<i class="bi bi-envelope"></i>
						<h4>Email :</h4>
						<p>{{ perusahaan('email') }}</p>
					</div>
					@endif

					@if (perusahaan('telp'))
					<div class="phone">
						<i class="bi bi-phone"></i>
						<h4>Telepon:</h4>
						<p>{{ perusahaan('telp') }}</p>
					</div>
					@endif

					@if (perusahaan('latitude') && perusahaan('longitude'))
					<iframe src="https://maps.google.co.id/?q={{ perusahaan('latitude').",%20".perusahaan('longitude') }}&z=60&output=embed" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
					@endif
				</div>

			</div>

			@livewire('comp.kirimwhatsapp')

		</div>

	</div>
</section>