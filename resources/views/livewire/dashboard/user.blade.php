<div>
	<div class="row">
		<div class="col-xl-3 col-md-6">
			<div class="card card-stats">
				<div class="card-body">
					<div class="row">
						<div class="col">
							<h5 class="card-title text-uppercase text-muted mb-0">Lemburan</h5>
							<span class="h2 font-weight-bold mb-0">{{ $lembur->where('status', 'APPROVED')->count() }}/{{ $lembur->count() }}</span>
						</div>
						<div class="col-auto">
							<div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
								<i class="fa fa-thumbs-up"></i>
							</div>
						</div>
					</div>
					<p class="mt-3 mb-0 text-sm">
						<span class="text-nowrap">Status APPROVED</span>
					</p>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-md-6 d-none">
			<div class="card card-stats">
				<div class="card-body">
					<div class="row">
						<div class="col">
							<h5 class="card-title text-uppercase text-muted mb-0">New users</h5>
							<span class="h2 font-weight-bold mb-0">2,356</span>
						</div>
						<div class="col-auto">
							<div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
								<i class="ni ni-chart-pie-35"></i>
							</div>
						</div>
					</div>
					<p class="mt-3 mb-0 text-sm">
						<span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
						<span class="text-nowrap">Since last month</span>
					</p>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-md-6">
			<div class="card card-stats">
				<div class="card-body">
					<div class="row">
						<div class="col">
							<h5 class="card-title text-uppercase text-muted mb-0">Honor lembur</h5>
							<span class="h2 font-weight-bold mb-0"><small>Rp. </small>{{ textNumber($honor) }}</span>
						</div>
						<div class="col-auto">
							<div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
								<i class="ni ni-money-coins"></i>
							</div>
						</div>
					</div>
					<p class="mt-3 mb-0 text-sm">
						<span class="text-nowrap">Bulan {{ date('F Y', strtotime($bulan)) }}</span>
					</p>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-md-6 d-none">
			<div class="card card-stats">
				<div class="card-body">
					<div class="row">
						<div class="col">
							<h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
							<span class="h2 font-weight-bold mb-0">49,65%</span>
						</div>
						<div class="col-auto">
							<div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
								<i class="ni ni-chart-bar-32"></i>
							</div>
						</div>
					</div>
					<p class="mt-3 mb-0 text-sm">
						<span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
						<span class="text-nowrap">Since last month</span>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>