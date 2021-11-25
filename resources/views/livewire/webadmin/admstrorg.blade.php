<div>
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
							<small class="h4 font-weight-light text-muted">{{ $data->jabatan }}</small><br>
							<small class="h4 font-weight-light text-muted">{{ $data->telp }}</small>
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

	<div wire:ignore.self class="modal fade" tabindex="-1" role="dialog" id="create">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Tambah Pejabat</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form wire:submit.prevent="submit" method="POST">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="form-control-label" for="nama">Nama Pejabat</label>
									<input type="text" class="form-control @error('nama') is-invalid @enderror" wire:model="nama" id="nama" placeholder="Name">
									@if($errors->has('nama'))
										<span class="invalid-feedback">{{ $errors->first('nama') }}</span>
									@endif
								</div>

								<div class="form-group">
									<label class="form-control-label" for="jabatan">Jabatan</label>
									<input type="text" class="form-control @error('jabatan') is-invalid @enderror" wire:model="jabatan" id="jabatan" placeholder="Jabatan">
									@if($errors->has('jabatan'))
										<span class="invalid-feedback">{{ $errors->first('jabatan') }}</span>
									@endif
								</div>

								<div class="form-group">
									<label class="form-control-label" for="telp">Nomor telpon</label>
									<input type="text" class="form-control @error('telp') is-invalid @enderror" wire:model="telp" id="telp" placeholder="gunakan +62">
									@if($errors->has('telp'))
										<span class="invalid-feedback">{{ $errors->first('telp') }}</span>
									@endif
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="form-control-label" for="photo">Pilih photo</label>
									<input type="file" class="form-control @error('photo') is-invalid @enderror" wire:model="photo" id="photo" placeholder="">
									@if($errors->has('photo'))
										<span class="invalid-feedback">{{ $errors->first('photo') }}</span>
									@endif

									@if ($photo)
										<img src="{{ $photo->temporaryUrl() }}" alt="" class="avatar rounded-circle mt-2">
									@endif
								</div>

								@if ($photo == "")
									<div class="form-group">
										<label class="form-control-label" for="existPhoto">Atau pilih photo yang sudah ada</label>
										<select class="form-control @error('existPhoto') is-invalid @enderror" wire:model="existPhoto" id="existPhoto">
											<option value=""></option>
											@foreach (gambarYangAda('/strorg') as $gbr)
												<option value="{{ $gbr }}">{{ $gbr }}</option>
											@endforeach
										</select>
										@if($errors->has('existPhoto'))
											<span class="invalid-feedback">{{ $errors->first('existPhoto') }}</span>
										@endif

										@if ($existPhoto)
											<img src="{{ '/storage/'.$existPhoto }}" alt="" class="avatar rounded-circle mt-2">
										@endif
									</div>
								@endif
							</div>
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
		<div class="modal-dialog modal-lg">
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
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="form-control-label" for="nama">Nama Pejabat</label>
									<input type="text" class="form-control @error('nama') is-invalid @enderror" wire:model="ednama" id="nama" placeholder="Name">
									@if($errors->has('nama'))
										<span class="invalid-feedback">{{ $errors->first('nama') }}</span>
									@endif
								</div>

								<div class="form-group">
									<label class="form-control-label" for="jabatan">Jabatan</label>
									<input type="text" class="form-control @error('jabatan') is-invalid @enderror" wire:model="edjabatan" id="jabatan" placeholder="Jabatan">
									@if($errors->has('jabatan'))
										<span class="invalid-feedback">{{ $errors->first('jabatan') }}</span>
									@endif
								</div>

								<div class="form-group">
									<label class="form-control-label" for="telp">Nomor telpon</label>
									<input type="text" class="form-control @error('telp') is-invalid @enderror" wire:model="edtelp" id="telp" placeholder="gunakan +62">
									@if($errors->has('telp'))
										<span class="invalid-feedback">{{ $errors->first('telp') }}</span>
									@endif
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="form-control-label" for="">Photo sekarang :</label><br>
									<img src="{{ $gambar }}" alt="" class="avatar rounded-circle mt-2">
								</div>
								<div class="form-group">
									<label class="form-control-label" for="edphoto">Upload photo baru</label>
									<input type="file" class="form-control @error('edphoto') is-invalid @enderror" wire:model="edphoto" id="edphoto" placeholder="">
									@if($errors->has('edphoto'))
										<span class="invalid-feedback">{{ $errors->first('edphoto') }}</span>
									@endif

									@if ($edphoto)
										<img src="{{ $edphoto->temporaryUrl() }}" alt="" class="avatar rounded-circle mt-2">
									@endif
								</div>

								@if ($edphoto == "")
									<div class="form-group">
										<label class="form-control-label" for="existPhoto">Atau pilih photo yang sudah ada</label>
										<select class="form-control @error('existPhoto') is-invalid @enderror" wire:model="existPhoto" id="existPhoto">
											<option value=""></option>
											@foreach (gambarYangAda('/strorg') as $gbr)
												<option value="{{ $gbr }}">{{ $gbr }}</option>
											@endforeach
										</select>
										@if($errors->has('existPhoto'))
											<span class="invalid-feedback">{{ $errors->first('existPhoto') }}</span>
										@endif

										@if ($existPhoto)
											<img src="{{ '/storage/'.$existPhoto }}" alt="" class="avatar rounded-circle mt-2">
										@endif
									</div>
								@endif
							</div>
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
						anda yakin akan menghapus dari struktur organisasi?
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
