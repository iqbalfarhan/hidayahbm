<section id="kontak" class="contact section-bg">
	<div class="container" data-aos="fade-up">

		<div class="section-title">
			<h2>Kontak kami</h2>
			<p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
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

			<div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
				<form action="{{ route('kirim.whatsapp') }}" method="POST" role="form" class="info">
					@csrf
					<div class="row">
						<div class="form-group col-md-6">
							<label for="name">Nama anda</label>
							<input type="text" name="name" class="form-control" id="name" required>
						</div>
						<div class="form-group col-md-6">
							<label for="name">Subjek pesan</label>
							<input type="text" class="form-control" name="subject" id="subject" required>
						</div>
					</div>
					<div class="form-group">
						<label for="name">Pesan</label>
						<textarea class="form-control" name="message" rows="10" required></textarea>
					</div>
					<div class="text-center">
						<button type="submit" class="btn btn-success">
							<span class="bi bi-whatsapp mr-2"></span> Kirim Whatsapp
						</button>
					</div>
				</form>
			</div>

		</div>

	</div>
</section>