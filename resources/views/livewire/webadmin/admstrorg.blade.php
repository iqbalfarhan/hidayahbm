<div>
	<p>
		<button data-toggle="modal" data-target="#createOrganisasi" class="btn btn-default btn-sm">Tambah baru</button>
	</p>
	<div class="row">
		@foreach ($datas as $data)
		<div class="col-md-3">
			<div class="card">
				<div class="card-body">
					<a href="#!">
						<img src="{{ url($data->gambar) }}" class="rounded-circle img-center img-fluid shadow shadow-lg--hover" style="width: 140px; height: 140px;">
					</a>
					<div class="pt-4 text-center">
						<h5 class="h3 title">
							<span class="d-block mb-1">{{ $data->nama }}</span>
							<small class="h4 font-weight-light text-muted">{{ $data->jabatan }}</small>
						</h5>
						<div class="mt-3">
							<button wire:click="edit({{ $data->id }})" class="btn btn-success btn-icon-only rounded-circle">
								<i class="fa fa-edit"></i>
							</button>
							<button wire:click="delete({{ $data->id }})" class="btn btn-danger btn-icon-only rounded-circle">
								<i class="fa fa-trash"></i>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>

	<div wire:ignore.self class="modal fade" tabindex="-1" role="dialog" id="createOrganisasi">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Tambah layanan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form wire:submit.prevent="submit" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<label for="nama">Nama layanan</label>
							<input type="text" class="form-control" wire:model="nama" id="nama" placeholder="">
						</div>
						<div class="form-group">
							<label for="jabatan">Jabatan</label>
							<input type="text" class="form-control" wire:model="jabatan" id="jabatan" placeholder="">
						</div>
						<div class="form-group">
							<label class="form-control-label" for="telp">No Telp</label>
							<input type="text" class="form-control @error('telp') is-invalid @enderror" id="telp" wire:model="telp" placeholder="">
							@if($errors->has('telp'))
							<span class="invalid-feedback">{{ $errors->first('telp') }}</span>
							@endif
						</div>

						<div class="form-group">
							<label for="photo">class photo</label>
							<input type="text" class="form-control" wire:model="photo" id="photo" placeholder="">
							<small class="form-text">https://photos.getbootstrap.com/ contoh : bi bi-alarm-fill</small>
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

	<div wire:ignore.self class="modal fade" tabindex="-1" role="dialog" id="editOrganisasi">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit layanan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				@if ($selected)
				<form wire:submit.prevent="updateOrganisasi({{ $selected }})" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<label for="nama">Nama layanan</label>
							<input type="text" class="form-control" wire:model="ednama" id="nama" placeholder="">
							@if($errors->has('edname'))
							<span class="invalid-feedback">{{ $errors->first('edname') }}</span>
							@endif
						</div>
						<div class="form-group">
							<label for="jabatan">Jabatan</label>
							<input type="text" class="form-control" wire:model="edjabatan" id="jabatan" placeholder="">
							@if($errors->has('edjabatan'))
							<span class="invalid-feedback">{{ $errors->first('edjabatan') }}</span>
							@endif
						</div>
						<div class="form-group">
							<label for="photo">class photo</label>
							<input type="text" class="form-control" wire:model="edphoto" id="photo" placeholder="">
							@if($errors->has('edphoto'))
							<span class="invalid-feedback">{{ $errors->first('edphoto') }}</span>
							@endif
							<small class="form-text">https://photos.getbootstrap.com/ contoh : bi bi-alarm-fill</small>
						</div>
						<div class="form-group">
							<label class="form-control-label" for="telp">No Telp</label>
							<input type="text" class="form-control @error('telp') is-invalid @enderror" id="telp" wire:model="edtelp" placeholder="">
							@if($errors->has('telp'))
							<span class="invalid-feedback">{{ $errors->first('telp') }}</span>
							@endif
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
				@endif
			</div>
		</div>
	</div>

	<div wire:ignore.self class="modal fade" tabindex="-1" role="dialog" id="deleteOrganisasi">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit layanan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				@if ($selected)
				<form wire:submit.prevent="deleteOrganisasi({{ $selected['id'] }})" method="POST">
					<div class="modal-body">
						anda yakin akan menghapus layanan ini?
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-danger">Hapus</button>
					</div>
				</form>
				@endif
			</div>
		</div>
	</div>

</div>
