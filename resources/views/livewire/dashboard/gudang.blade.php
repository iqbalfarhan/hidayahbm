<div>
	<div class="row justify-content-center">
		<div class="col-md-3">
			<div class="card bg-gradient-danger border-0">
				<div class="card-body">
					<div class="row">
						<div class="col">
							<h5 class="card-title text-uppercase text-muted mb-0 text-white">stok bahan < 5</h5>
							<span class="h2 font-weight-bold mb-0 text-white">{{ $barangs->where('stok', '<', 5)->count() }}</span>
							<div class="progress progress-xs mt-3 mb-0">
								<div class="progress-bar bg-success" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>
							</div>
						</div>
						<div class="col-auto">
							<button type="button" class="btn btn-sm btn-neutral mr-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-ellipsis-h"></i>
							</button>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="#">Action</a>
								<a class="dropdown-item" href="#">Another action</a>
								<a class="dropdown-item" href="#">Something else here</a>
							</div>
						</div>
					</div>
					<p class="mt-3 mb-0 text-sm">
						<a href="{{ route('barang.index') }}" class="text-nowrap text-white font-weight-600">See details</a>
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			
		</div>
		<div class="col-md-6">
			<div class="card shadow">
				<div class="card-header border-0">
					<h3 class="mb-0">Cari bahan makanan</h3>
				</div>
				<div class="card-body">
					<div class="form-group">
						<label class="form-control-label" for="sku">Cari barang dengan SKU</label>
						<input type="search" class="form-control @error('sku') is-invalid @enderror" id="sku" wire:model="sku" placeholder="Scan barcode barang">
						@if($errors->has('sku'))
						<span class="invalid-feedback">{{ $errors->first('sku') }}</span>
						@endif
					</div>	
					@if ($barang)
					<table class="table table-bordered table-sm">
						<tr>
							<th>Nama Produk</th>
							<td>{{ $barang->nama }}</td>
						</tr>
						<tr>
							<th>Keterangan</th>
							<td>{{ $barang->keterangan }}</td>
						</tr>
						<tr>
							<th>SKU</th>
							<td>{{ $barang->sku }}</td>
						</tr>
						<tr>
							<th>Stok</th>
							<td class="text-red"><strong>{{ $barang->stok }}</strong> {{ $barang->satuan }}</td>
						</tr>
					</table>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>