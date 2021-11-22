<div>
	<div class="row">
		<div class="col-md-9">
			<div class="card shadow">
				<div class="card-header border-0">
					<h3 class="mb-0">{{ $judul == "" ? "Belum ada judul" : $judul }}</h3>
				</div>
				<form wire:submit.prevent="update" method="POST">
					<div class="card-body">
						<div class="form-group">
							<label class="form-control-label" for="judul">Judul Halaman</label>
							<input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" wire:model="judul" placeholder="judul">
							@if($errors->has('judul'))
							<span class="invalid-feedback">{{ $errors->first('judul') }}</span>
							@endif
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="form-control-label" for="photo">Photo baru</label>
									<input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo" placeholder="">
									@if($errors->has('photo'))
									<span class="invalid-feedback">{{ $errors->first('photo') }}</span>
									@endif
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="form-control-label" for="existPhoto">Pilih photo dari yang sudah ada</label>
									<select wire:model="existPhoto" id="existPhoto" class="form-control">
										<option value="">Pilih file</option>

										@foreach ($files as $file)
											<option value="{{ $file }}">{{ $file }}</option>
										@endforeach
									</select>
									@if($errors->has('photo'))
									<span class="invalid-feedback">{{ $errors->first('photo') }}</span>
									@endif
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
					</div>
					<div class="card-footer">
						<button class="btn btn-primary"><i class="fa fa-check mr-2"></i>Simpan</button>
					</div>
				</form>
			</div>
		</div>
		<div class="col-md-3">
			<div class="list-group">
				@foreach ($datas as $data)
				<a href="#" wire:click="$set('slug', '{{ $data->slug }}')" class="list-group-item {{ $slug == $data->slug ? "bg-secondary" : "" }}">{{ $data->judul }}</a>
				@endforeach
				@if ($allowAdd == true)
				<a href="#" class="list-group-item" data-toggle="modal" data-target="#createProfil"><i class="fa fa-plus"></i></a>
				@endif
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
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>

</div>

