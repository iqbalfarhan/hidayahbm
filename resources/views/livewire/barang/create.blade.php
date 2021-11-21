<div>
	<div wire:ignore.self class="modal fade" tabindex="-1" role="modal" id="createBarang">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Tambah barang baru</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label class="form-control-label" for="nama">Nama barang</label>
						<input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" wire:model="nama" placeholder="nama barang">
						@if($errors->has('nama'))
							<span class="invalid-feedback">{{ $errors->first('nama') }}</span>
						@endif
					</div>	
					<div class="form-group">
						<label class="form-control-label" for="keterangan">Keterangan</label>
						<textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" wire:model="keterangan" placeholder="keterangan barang"></textarea>
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
								<label class="form-control-label" for="sku">SKU</label>
								<input type="text" class="form-control @error('sku') is-invalid @enderror" id="sku" wire:model="sku" placeholder="Scan Barcode">
								@if($errors->has('sku'))
									<span class="invalid-feedback">{{ $errors->first('sku') }}</span>
								@endif
							</div>
								
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