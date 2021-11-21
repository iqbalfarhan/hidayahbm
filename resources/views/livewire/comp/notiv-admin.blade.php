<div class="dropdown-menu dropdown-menu-xl dropdown-menu-right py-0 overflow-hidden">
	<div class="px-3 py-3">
		<h6 class="text-sm text-muted m-0">
			<strong class="text-primary">3</strong> lemburan belum di Approve.
		</h6>
	</div>
	<div class="list-group list-group-flush">
		<a href="#!" class="list-group-item list-group-item-action">
			<div class="row align-items-center">
				<div class="col-auto">
					<!-- Avatar -->
					<img alt="Image placeholder" src="{{ url(auth()->user()->gambar) }}" class="avatar rounded-circle">
				</div>
				<div class="col ml--2">
					<div class="d-flex justify-content-between align-items-center">
						<div>
							<h4 class="mb-0 text-sm">{{ auth()->user()->name }}</h4>
						</div>
						<div class="text-right text-muted">
							<small>{{ auth()->user()->created_at }}</small>
						</div>
					</div>
					<p class="text-sm mb-0">{{ auth()->user()->keterangan }}</p>
				</div>
			</div>
		</a>
	</div>
	<a href="" class="dropdown-item text-center text-primary font-weight-bold py-3">Lihat semua</a>
</div>