<footer id="footer">
	<div class="footer-top">
		<div class="container">
			<div class="row">

				<div class="col-lg-3 col-md-6 footer-contact">
					<h5>{{ perusahaan('nama') }}</h5>
					<p>
						{{ perusahaan('alamat') }}
						<br>
						<br>
						<strong>Phone:</strong> {{ perusahaan('telp') }}<br>
						<strong>Email:</strong> {{ perusahaan('email') }}<br>
					</p>
				</div>

				<div class="col-lg-3 col-md-6 footer-links">
					<h4>Profil Lainnya</h4>
					<ul>
						@foreach (App\Profil::all() as $profil)
						<li><i class="bx bx-chevron-right"></i> <a href="{{ route('web.profil',$profil->slug) }}">{{ $profil->judul }}</a></li>
						@endforeach
					</ul>
				</div>

				<div class="col-lg-3 col-md-6 footer-links">
					<h4>Layanan Kami</h4>
					<ul>
						@foreach ($layanan as $lyn)
						<li><i class="bx bx-chevron-right"></i> <a href="#layanan" class="scrollto">{{ $lyn->nama }}</a></li>
						@endforeach
					</ul>
				</div>

				<div class="col-lg-3 col-md-6 footer-links">
					<h4>Sosial Media</h4>
					<p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
					<div class="social-links mt-3">
						<a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
						<a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
						<a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
						<a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
						<a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
					</div>
				</div>

			</div>
		</div>
	</div>

	<div class="container footer-bottom clearfix">
		<div class="copyright">
			&copy; Copyright <strong><span>Arsha</span></strong>. All Rights Reserved
		</div>
		<div class="credits">
			Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
		</div>
	</div>
</footer>

<div id="preloader"></div>
<a href="https://api.whatsapp.com/send?phone={{ perusahaan('whatsapp') }}&text=Hallo, saya ingin bertanya." class="whatsapp-button d-flex align-items-center justify-content-center"><i class="bi bi-whatsapp"></i></a>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>