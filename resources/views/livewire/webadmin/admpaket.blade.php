<div>
	<div class="mb-3">
		<button data-toggle="modal" data-target="#createPaket" class="btn btn-default "><i class="fa fa-plus mr-2"></i>Tambah Paket</button>
	</div>
	<div class="row">
		@foreach($datas as $data)
		<div class="col-md-4">
			<div class="card">
				<div class="card-header border-0">
					<h3 class="card-title mb-0">
						{{ $data->nama }}
						@if ($data->terlaris)
						<span class="badge badge-success text-right">Terlaris</span>
						@endif
					</h3>
				</div>
				<img src="{{ url($data->gambar) }}" alt="" class="card-img">
				<div class="card-body">
					<ul>
						@foreach (json_decode($data->list_menu) as $list)
						<li>{{ $list }}</li>
						@endforeach
					</ul>
					<div class="display-4 text-success">Rp. {{ $data->price}}</div>
					<div class="text-muted">{{ $data->keterangan}}</div>
				</div>
				<div class="card-footer">
					<button wire:click="edit({{ $data->id }})" class="btn btn-primary mx-0 btn-sm"><i class="fa fa-edit"></i></button>
					<button wire:click="delete({{ $data->id }})" class="btn btn-danger mx-0 btn-sm"><i class="fa fa-trash"></i></button>
				</div>
			</div>
		</div>
		@endforeach
	</div>

	<div wire:ignore.self class="modal fade" tabindex="-1" role="dialog" id="createPaket">
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
									<label for="nama">Nama paket</label>
									<input type="text" class="form-control" wire:model="nama" id="nama" placeholder="Nama paket">
								</div>
								<div class="form-group">
									<label for="list_menu">List menu</label>
									<textarea class="form-control" wire:model="list_menu" id="list_menu" placeholder="pisahkan dengan enter" rows="10"></textarea>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="photo">Photo paket</label>
									<input type="file" class="form-control" wire:model="photo" id="photo" placeholder="pilih photo">
								</div>
								<div class="form-group">
									<label for="harga">Harga paket</label>
									<input type="text" class="form-control" wire:model="harga" id="harga" placeholder="masukkan angka tanpa titik/koma" autocomplete="off">
									@if ($harga)
									<span class="text-number">Rp. {{ textNumber($harga) }}</span>
									@endif
								</div>
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="terlaris" wire:model="terlaris">
									<label class="custom-control-label" for="terlaris">Ditandai sebagai menu terlaris</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="keterangan">Keterangan</label>
							<input type="text" class="form-control" wire:model="keterangan" id="keterangan" placeholder="keterangan paket. isi juka ada">
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
					<h5 class="modal-title">Edit Paket</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				@if ($selected)
				<form wire:submit.prevent="updatePaket({{ $selected }})" method="POST">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="ednama">Nama paket</label>
									<input type="text" class="form-control" wire:model="ednama" id="ednama" placeholder="Nama paket">
								</div>
								<div class="form-group">
									<label for="edlist_menu">List menu</label>
									<textarea class="form-control" wire:model="edlist_menu" id="edlist_menu" placeholder="pisahkan dengan enter" rows="10"></textarea>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="edphoto">Photo paket</label>
									<input type="file" class="form-control" wire:model="edphoto" id="edphoto" placeholder="pilih photo">
								</div>
								<div class="form-group">
									<label for="edharga">Harga paket</label>
									<input type="text" class="form-control" wire:model="edharga" id="edharga" placeholder="masukkan angka tanpa titik/koma" autocomplete="off">
									@if ($edharga)
									<span class="text-number">Rp. {{ textNumber($edharga) }}</span>
									@endif
								</div>
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="edterlaris" wire:model="edterlaris">
									<label class="custom-control-label" for="edterlaris">Ditandai sebagai menu terlaris</label>
								</div>

							</div>
						</div>
						<div class="form-group">
							<label for="edketerangan">Keterangan</label>
							<input type="text" class="form-control" wire:model="edketerangan" id="edketerangan" placeholder="keterangan paket. isi juka ada">
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
				<form wire:submit.prevent="deletePaket({{ $selected['id'] }})" method="POST">
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
