<div>
	<div class="row">
		<div class="col-md-3">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title mb-0">
						Klik untuk edit menu profil :
					</h5>
				</div>
				<div class="list-group list-group-flush">
					@foreach ($datas as $data)
					<div style="cursor: pointer" wire:click="$set('slug', '{{ $data->slug }}')" class="list-group-item {{ $slug == $data->slug ? "bg-secondary" : "" }}">
						@if ($data->tampil_di_home == 1)
						<i class="fa fa-eye mr-2"></i>
						@endif
						{{ $data->judul }}
					</div>
					@endforeach
				</div>
				<div class="card-body">
					@if ($allowAdd == true)
					<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#createProfil"><i class="fa fa-plus mr-2"></i>Tambah halaman</button>
					@endif
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<div class="card shadow">
				<div class="card-header border-0">
					<div class="row align-items-center">
						<div class="col-md-6">
							<h3 class="mb-0">{{ $judul == "" ? "Belum ada judul" : $judul }}</h3>
						</div>
						<div class="col-md-6 text-right">
							<button data-toggle="modal" data-target="#editProfil" class="btn btn-primary btn-sm"><i class="fa fa-edit mr-2"></i>Edit halaman</button>
						</div>
					</div>
				</div>
				<div class="card-body">
					<img src="{{ url($gambar) }}" alt="" class="w-100 rounded shadow mb-3">
					<p style="text-indent: 50px!important; text-align: justify;">
						{!! str_replace("<br />", "</p><p style=\"text-indent: 50px; text-align: justify;\">", nl2br($isi)) !!}
					</p>
				</div>
			</div>
		</div>
	</div>

	<div wire:ignore.self class="modal fade" tabindex="-1" role="dialog" id="editProfil">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">
						Edit {{ $judul }}
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form wire:submit.prevent="update" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<label class="form-control-label" for="judul">Judul Halaman</label>
							<input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" wire:model="judul" placeholder="judul">
							@if($errors->has('judul'))
							<span class="invalid-feedback">{{ $errors->first('judul') }}</span>
							@endif
						</div>
						<div class="row">
							<div class="col-md-4">
								<img src="{{ url($gambar) }}" alt="" class="w-100 rounded mb-3">
								<div class="form-group">
									<label class="form-control-label" for="newphoto">Photo baru</label>
									<input type="file" class="form-control @error('newphoto') is-invalid @enderror" id="newphoto" wire:model="newphoto" placeholder="" accept="image/*">
									@if($errors->has('newphoto'))
									<span class="invalid-feedback">{{ $errors->first('newphoto') }}</span>
									@endif

									@if ($newphoto)
									<img src="{{ $newphoto->temporaryUrl() }}" alt="" class="w-100">
									@endif

									<button type="button" class="btn btn-danger btn-sm mt-2" wire:click="$set('newphoto', '')">
										<i class="fa fa-times mr-2"></i>reset photo
									</button>

								</div>
							</div>
							<div class="col-md-4">
								@empty ($newphoto)
								<div class="form-group">
									<label class="form-control-label" for="existPhoto">Pilih photo dari yang sudah ada</label>
									<select wire:model="existPhoto" id="existPhoto" class="form-control">
										<option value="">Pilih file</option>
										@foreach (gambarYangAda() as $file)
										<option value="{{ $file }}">{{ $file }}</option>
										@endforeach
									</select>
									<img src="{{ url('/storage/'.$existPhoto) }}" alt="" class="w-100">
									@if($errors->has('existPhoto'))
									<span class="invalid-feedback">{{ $errors->first('existPhoto') }}</span>
									@endif
								</div>
								@endempty
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<div class="form-control-label mb-2">Tampil di home</div>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="tampil_di_home" wire:model="tampil_di_home">
										<label class="custom-control-label" for="tampil_di_home">Tampilkan "{{ $judul }}" di halaman awal.</label>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="form-control-label" for="isi">Article bacaan</label>
							<textarea class="form-control @error('isi') is-invalid @enderror" id="isi" wire:model="isi" placeholder="isi tulisan paragraph" rows="10"></textarea>
							@if($errors->has('isi'))
							<span class="invalid-feedback">{{ $errors->first('isi') }}</span>
							@endif
						</div>
						<div class="form-group">
							<label class="form-control-label" for="">Hapus halaman ini ?</label><br>
							<button type="button" wire:click="delete" class="btn btn-danger btn-sm"><i class="fa fa-trash mr-2"></i>Hapus</button>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">tutup</button>
						<button type="submit" class="btn btn-primary">Simpan perubahan</button>
					</div>
				</form>
			</div>
		</div>
	</div>


	<div wire:ignore.self class="modal fade" tabindex="-1" role="modal" id="createProfil">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Tambah halaman profil</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form wire:submit.prevent="addNewSlug">
					<div class="modal-body">
						<div class="form-group">
							<label for="newjudul">Judul halaman</label>
							<input type="text" class="form-control @error('newjudul') is-invalid @enderror" wire:model="newjudul" id="newjudul" placeholder="">
							@if($errors->has('newjudul'))
							<span class="invalid-feedback">{{ $errors->first('newjudul') }}</span>
							@endif

							@if ($newjudul)
							<small>Slug : {{ Illuminate\Support\Str::slug($newjudul, '-') }}</small>
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

</div>