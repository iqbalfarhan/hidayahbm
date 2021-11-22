<section id="kegiatan" class="portfolio">
	<div class="container" data-aos="fade-up">

		<div class="section-title">
			<h2>Kegiatan</h2>
			<p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
		</div>

		<ul id="portfolio-flters" class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
			<li data-filter="*" class="filter-active">All</li>
			@foreach (App\Kegiatan::distinct('tag')->pluck('tag') as $tag)
				<li data-filter=".filter-{{ $tag }}" class="text-capitalize">{{ $tag }}</li>
			@endforeach
		</ul>

		<div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

			@foreach (App\Kegiatan::get()->take(10) as $kegiatan)
				<div class="col-lg-4 col-md-6 portfolio-item filter-{{ $kegiatan->tag }}">
					<div class="portfolio-img"><img src="{{ url($kegiatan->gambar) }}" class="img-fluid" alt=""></div>
					<div class="portfolio-info">
						<h4>{{ $kegiatan->judul }}</h4>
						<p>{{ $kegiatan->tag }}</p>
						<a href="{{ url($kegiatan->gambar) }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="{{ $kegiatan->isi }}">
							<i class="bx bx-plus"></i>
						</a>
						<a href="#" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
					</div>
				</div>
			@endforeach

		</div>

	</div>

	<div class="row">
		<div class="col-md-12 text-center">
			<a href="#" class="buy-btn">Kegiatan Lainnya</a>
		</div>
	</div>
</section>