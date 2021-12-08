<div>
	<div wire:ignore.self class="modal fade" tabindex="-1" role="modal" id="createBarang">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Tambah bahan makanan baru</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-control-label" for="nama">Nama bahan makanan</label>
								<input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" wire:model="nama" placeholder="nama bahan makanan">
								@if($errors->has('nama'))
									<span class="invalid-feedback">{{ $errors->first('nama') }}</span>
								@endif
							</div>	
							<div class="form-group">
								<label class="form-control-label" for="keterangan">Keterangan</label>
								<textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" wire:model="keterangan" placeholder="keterangan bahan makanan"></textarea>
								@if($errors->has('keterangan'))
									<span class="invalid-feedback">{{ $errors->first('keterangan') }}</span>
								@endif
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="form-control-label" for="satuan">Satuan</label>
										<input type="text" class="form-control @error('satuan') is-invalid @enderror" id="satuan" wire:model="satuan" placeholder="satuan buah, bungkus">
										@if($errors->has('satuan'))
											<span class="invalid-feedback">{{ $errors->first('satuan') }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-6">
										<div class="form-group">
											<label class="form-control-label" for="min_stok">Minimal stok</label>
											<input type="number" class="form-control @error('min_stok') is-invalid @enderror" wire:model="min_stok" id="min_stok" placeholder="Minimal stok bahan makanan">
											@if($errors->has('min_stok'))
												<span class="invalid-feedback">{{ $errors->first('min_stok') }}</span>
											@endif
										</div>
								</div>
							</div>
							<div class="form-group">
								<label class="form-control-label" for="sku">SKU</label>
								<input type="text" class="form-control @error('sku') is-invalid @enderror" id="sku" wire:model="sku" placeholder="Scan Barcode">
								@if($errors->has('sku'))
									<span class="invalid-feedback">{{ $errors->first('sku') }}</span>
								@endif
								<span class="small form-text">Bila bahan tidak memiliki barcode bisa dikosongkan saja</span>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-control-label" for="stok">Stok awal bahan</label>
								<input type="number" class="form-control @error('stok') is-invalid @enderror" wire:model="stok" id="stok" placeholder="">
								@if($errors->has('stok'))
									<span class="invalid-feedback">{{ $errors->first('stok') }}</span>
								@endif
							</div>

							@if ($stok)
							<label class="form-control-label" for="stok">Keterangan transaksi</label>
							<table class="table table-sm table-bordered">
								<tr>
									<th>Jenis</th>
									<td>Penambahan stok</td>
								</tr>
								<tr>
									<th>Keterangan</th>
									<td>Stok awal bahan makanan</td>
								</tr>
								<tr>
									<th>Jml Stok</th>
									<td>{{ $stok }} {{ $satuan }}</td>
								</tr>
							</table>
							@endif

						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button wire:click="close" type="button" class="btn btn-secondary">Tutup</button>
					<button wire:click="simpan" type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</div>
		</div>
	</div>
		
</div>