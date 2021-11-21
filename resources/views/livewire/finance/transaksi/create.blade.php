<div wire:ignore.self class="modal fade" tabindex="-1" role="modal" id="createTransaksi">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah transaksi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form wire:submit.prevent="simpan">
				<div class="modal-body">
					<div class="form-group">
						<label class="form-control-label" for="tanggal">Tanggal transaksi</label>
						<input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" wire:model="tanggal" placeholder="">
						@if($errors->has('tanggal'))
							<span class="invalid-feedback">{{ $errors->first('tanggal') }}</span>
						@endif
					</div>
					<div class="form-group">
						<label class="form-control-label" for="jenis">Jenis transaksi</label>
						<select class="form-control @error('jenis') is-invalid @enderror" id="jenis" wire:model="jenis">
							<option value="masuk">Transaksi pemasukan</option>
							<option value="keluar">Transaksi pengeluaran</option>
						</select>
						@if($errors->has('jenis'))
							<span class="invalid-feedback">{{ $errors->first('jenis') }}</span>
						@endif
					</div>
						
					<div class="form-group">
						<label class="form-control-label" for="nominal">Nominal</label>
						<input type="number" class="form-control @error('nominal') is-invalid @enderror" id="nominal" wire:model="nominal" placeholder="">
						@if($errors->has('nominal'))
							<span class="invalid-feedback">{{ $errors->first('nominal') }}</span>
						@endif

						@if ($nominal)
							Rp. {{ textNumber($nominal) }}
						@endif
					</div>
					<div class="form-group">
						<label class="form-control-label" for="keterangan">Keterangan</label>
						<input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" wire:model="keterangan" placeholder="keterangan transaksi">
						@if($errors->has('keterangan'))
							<span class="invalid-feedback">{{ $errors->first('keterangan') }}</span>
						@endif
					</div>
						
						
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
	