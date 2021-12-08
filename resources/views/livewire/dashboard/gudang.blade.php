<div>
	<div class="card">
		<div class="card-header border-0">
			<div class="row align-items-center">
				<div class="col-md-6">
					<h3 class="card-title mb-0">Status stok bahan makanan</h3>
				</div>
				<div class="col-md-6 text-right">
					
				</div>
			</div>
		</div>
		<div class="card-body py-0">
			<div class="row">
				<div class="col-md-3">
					<div class="card bg-gradient-primary border-0">
						<div class="card-body">
							<div class="row align-items-center">
								<div class="col-3">
									<h1 class="m-0 text-white text-center">
										<i class="fas fa-box"></i>
									</h1>
								</div>
								<div class="col-auto">
									<h5 class="card-title text-uppercase text-muted mb-0 text-white">Total B. Makanan</h5>
									<span class="h2 font-weight-bold mb-0 text-white">{{ $barangs->count() }} <small>bahan</small></span>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-3">
					<div class="card bg-gradient-danger border-0">
						<div class="card-body">
							<div class="row align-items-center">
								<div class="col-3">
									<h1 class="m-0 text-white text-center">
										<i class="fas fa-business-time"></i>
									</h1>
								</div>
								<div class="col-auto">
									<h5 class="card-title text-uppercase text-muted mb-0 text-white">Stok Bahan kurang</h5>
									<span class="h2 font-weight-bold mb-0 text-white">{{ $barangs->where('status_stok', 'kurang')->count() }} <small>bahan</small></span>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-3">
					<div class="card bg-gradient-warning border-0">
						<div class="card-body">
							<div class="row align-items-center">
								<div class="col-3">
									<h1 class="m-0 text-white text-center">
										<i class="fas fa-box-open"></i>
									</h1>
								</div>
								<div class="col-auto">
									<h5 class="card-title text-uppercase text-muted mb-0 text-white">Stok Bahan habis</h5>
									<span class="h2 font-weight-bold mb-0 text-white">{{ $barangs->where('status_stok', 'habis')->count() }} <small>bahan</small></span>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-3">
					<div class="card bg-gradient-info border-0">
						<div class="card-body">
							<div class="row align-items-center">
								<div class="col-3">
									<h1 class="m-0 text-white text-center">
										<i class="fas fa-archive"></i>
									</h1>
								</div>
								<div class="col-auto">
									<h5 class="card-title text-uppercase text-muted mb-0 text-white">Stok Bahan Aman</h5>
									<span class="h2 font-weight-bold mb-0 text-white">{{ $barangs->where('status_stok', 'aman')->count() }} <small>bahan</small></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>