<div>
	<p class="mb-2">
		@foreach ($datas as $data)
			<button wire:click="$set('slug', '{{ $data->slug }}')" class="btn btn-default btn-sm mx-0 {{ $slug == $data->slug ? "active" : "" }}">{{ $data->judul }}</button>
		@endforeach
		@if ($allowAdd == true)
			<button class="btn btn-default btn-sm" data-toggle="modal" data-target="#createProfil"><i class="fa fa-plus"></i></button>
		@endif
	</p>
	
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
					<div class="col-md-9">
						<div class="form-group">
							<label class="form-control-label" for="isi">Article bacaan</label>
							<textarea class="form-control @error('isi') is-invalid @enderror" id="isi" wire:model="isi" placeholder="isi tulisan paragraph" rows="10"></textarea>
							@if($errors->has('isi'))
							<span class="invalid-feedback">{{ $errors->first('isi') }}</span>
							@endif
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label class="form-control-label" for="photo">Photo</label>
							<input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo" placeholder="">
							@if($errors->has('photo'))
								<span class="invalid-feedback">{{ $errors->first('photo') }}</span>
							@endif
						</div>
							
					</div>
				</div>
			</div>
			<div class="card-footer">
				<button class="btn btn-primary"><i class="fa fa-check mr-2"></i>Simpan</button>
			</div>
		</form>
		<div class="card-body">
			{{-- <iframe id="google_map" src="https://maps.google.co.id/?q=-1.237927, 116.852852&z=60&output=embed" frameborder="0" class="w-100"></iframe> --}}
		</div>
	</div>

	<div wire:ignore.self class="modal fade" tabindex="-1" role="modal" id="createProfil">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form wire:submit.prevent="addNewSlug">
					<div class="modal-body">
						<div class="form-group">
							<label class="form-control-label" for="newslug">Slug</label>
							<input type="text" class="form-control @error('newslug') is-invalid @enderror" id="newslug" wire:model="newslug" placeholder="Slug">
							@if($errors->has('newslug'))
								<span class="invalid-feedback">{{ $errors->first('newslug') }}</span>
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

