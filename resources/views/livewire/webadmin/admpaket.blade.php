<div>
	<div class="row">
		@foreach($datas as $data)
		<div class="col-md-6">
			<div class="card">
				<div class="card-header border-0">
					<div class="row align-items-center">
						<div class="col-md-6">
							<h3 class="card-title mb-0">
								{{ $data->nama }}
								@if ($data->terlaris)
								<span class="badge badge-success text-right">Terlaris</span>
								@endif
							</h3>
						</div>
						<div class="col-md-6 text-right">
							<button wire:click="edit({{ $data->id }})" class="btn btn-primary mx-0 btn-sm"><i class="fa fa-edit"></i></button>
							<button wire:click="delete({{ $data->id }})" class="btn btn-danger mx-0 btn-sm"><i class="fa fa-trash"></i></button>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-3">
							<img src="{{ url($data->gambar) }}" alt="" class="w-100 rounded">
						</div>
						<div class="col-md-5">
							<ul class="list-unstyled">
								@foreach (json_decode($data->list_menu) as $list)
								<li><i class="fa fa-check text-success mr-3"></i>{{ $list }}</li>
								@endforeach
							</ul>
						</div>
						<div class="col-md-4">
							@if ($data->harga)
							<div class="display-4 text-success">Rp. {{ $data->price}}</div>
							@endif
							<div class="text-muted">{{ $data->keterangan}}</div>
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
					<h5 class="modal-title">Tambah Paket</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form wire:submit.prevent="submit" method="POST">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="nama" class="form-control-label">Nama paket</label>
									<input type="text" class="form-control" wire:model="nama" id="nama" placeholder="Nama paket">
								</div>
								<div class="form-group">
									<label for="list_menu" class="form-control-label">List menu</label>
									<textarea class="form-control" wire:model="list_menu" id="list_menu" placeholder="pisahkan dengan enter" rows="10"></textarea>
								</div>
							</div>
							<div class="col-md-6">
								<div class="custom-control custom-checkbox mb-4">
									<input type="checkbox" class="custom-control-input" id="terlaris" wire:model="terlaris">
									<label class="custom-control-label" for="terlaris">Ditandai sebagai menu terlaris</label>
								</div>

								<div class="form-group">
									<label for="harga" class="form-control-label">Harga paket</label>
									<input type="text" class="form-control" wire:model="harga" id="harga" placeholder="masukkan angka tanpa titik/koma" autocomplete="off">
									@if ($harga)
									<span class="text-number">Rp. {{ textNumber($harga) }}</span>
									@endif
								</div>
								<div class="form-group">
									<label for="keterangan" class="form-control-label">Keterangan</label>
									<input type="text" class="form-control" wire:model="keterangan" id="keterangan" placeholder="keterangan paket. isi juka ada">
								</div>
							</div>
						</div>
						<div class="row">
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
							</div>
							<div class="col-md-6">
								@if ($photo == "")
								<div class="form-group">
									<label class="form-control-label" for="existPhoto">Atau pilih photo yang sudah ada</label>
									<select class="form-control @error('existPhoto') is-invalid @enderror" wire:model="existPhoto" id="existPhoto">
										<option value=""></option>
										@foreach (gambarYangAda('/paket') as $gbr)
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

	<div wire:ignore.self class="modal fade" tabindex="-1" role="dialog" id="editPaket">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Tambah Paket</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				@if ($selected)
					<form wire:submit.prevent="updatePaket('{{ $selected }}')" method="POST">
						<div class="modal-body">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="nama" class="form-control-label">Nama paket</label>
										<input type="text" class="form-control" wire:model="ednama" id="nama" placeholder="Nama paket">
									</div>
									<div class="form-group">
										<label for="list_menu" class="form-control-label">List menu</label>
										<textarea class="form-control" wire:model="edlist_menu" id="list_menu" placeholder="pisahkan dengan enter" rows="10"></textarea>
									</div>
								</div>
								<div class="col-md-6">
									<div class="custom-control custom-checkbox mb-4">
										<input type="checkbox" class="custom-control-input" id="terlaris" wire:model="edterlaris">
										<label class="custom-control-label" for="terlaris">Ditandai sebagai menu terlaris</label>
									</div>

									<div class="form-group">
										<label for="harga" class="form-control-label">Harga paket</label>
										<input type="text" class="form-control" wire:model="edharga" id="harga" placeholder="masukkan angka tanpa titik/koma" autocomplete="off">
										@if ($harga)
										<span class="text-number">Rp. {{ textNumber($harga) }}</span>
										@endif
									</div>
									<div class="form-group">
										<label for="keterangan" class="form-control-label">Keterangan</label>
										<input type="text" class="form-control" wire:model="edketerangan" id="keterangan" placeholder="keterangan paket. isi juka ada">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<img src="{{ url($gambar) }}" alt="" class="avatar">
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
								</div>
								<div class="col-md-6">
									@if ($photo == "")
									<div class="form-group">
										<label class="form-control-label" for="existPhoto">Atau pilih photo yang sudah ada</label>
										<select class="form-control @error('existPhoto') is-invalid @enderror" wire:model="existPhoto" id="existPhoto">
											<option value=""></option>
											@foreach (gambarYangAda('/paket') as $gbr)
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

	<div wire:ignore.self class="modal fade" tabindex="-1" role="dialog" id="deletePaket">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Hapus Paket</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				@if ($selected)
				<form wire:submit.prevent="deletePaket({{ $selected }})" method="POST">
					<div class="modal-body">
						anda yakin akan menghapus Paket ini?
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
