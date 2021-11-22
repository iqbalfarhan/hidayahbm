<div>
	<p>
		<a href="{{ url('/') }}" class="btn btn-default"><i class="fa fa-check mr-2"></i>Halaman web</a>
	</p>
	<div class="card shadow">
		<div class="card-header border-0">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="mb-0">Dashboard</h3>
				</div>
				<div class="col text-right">
					<a href="#createData" data-toggle="modal" class="btn btn-sm btn-primary">Tambah data</a>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-4">
					<img src="{{ url($datas->where('parameter', 'logo')->first()->value) }}" alt="{{ $datas->where('parameter', 'logo')->first()->value }}" class="w-100 mb-3" >


					<p class="text-muted">
						<small>{{ $datas->where('parameter', 'logo')->first()->value }}</small>
					</p>

					<button data-toggle="modal" data-target="#uploadPhoto" class="btn btn-primary "><i class="fa fa-camera mr-2"></i>Update logo</button>
				</div>
				<div class="col-md-8">
					@foreach ($datas->where('parameter', '!=', 'logo') as $data)
					<div class="mb-3">
						<h4 class="mb-0">{{ $data->parameter }} perusahaan :</h4>
						{{ $data->value }}

						<a href="#" wire:click="editparam('{{ $data->parameter }}')" class="float-right"><i class="fa fa-edit"></i></a>
					</div>
					@endforeach
					
				</div>
			</div>
		</div>
	</div>

	<div wire:ignore.self class="modal fade" tabindex="-1" role="modal" id="createData">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Tambah data parameter</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form wire:submit.prevent="simpanData">
					<div class="modal-body">
						<div class="form-group">
							<label class="form-control-label" for="parameter">Parameter</label>
							<input type="text" class="form-control @error('parameter') is-invalid @enderror" id="parameter" wire:model="newparameter" placeholder="">
							@if($errors->has('parameter'))
								<span class="invalid-feedback">{{ $errors->first('parameter') }}</span>
							@endif
						</div>
							

						<div class="form-group">
							<label class="form-control-label" for="value">Value</label>
							<input type="text" class="form-control @error('value') is-invalid @enderror" id="value" wire:model="newvalue" placeholder="Value atau isi">
							@if($errors->has('value'))
								<span class="invalid-feedback">{{ $errors->first('value') }}</span>
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

	<div wire:ignore.self class="modal fade" tabindex="-1" role="modal" id="editData">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit data perusahaan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form wire:submit.prevent="submit">
					<div class="modal-body">
						<div class="form-group">
							<label class="form-control-label" for="parameter">Parameter</label>
							<select class="form-control @error('parameter') is-invalid @enderror" id="parameter" wire:model="parameter">
								<option value="">-- Pilih parameter --</option>
								@foreach ($params as $param)
									<option value="{{ $param }}">{{ $param }}</option>
								@endforeach
							</select>
							@if($errors->has('parameter'))
							<span class="invalid-feedback">{{ $errors->first('parameter') }}</span>
							@endif
						</div>

						<div class="form-group">
							<label class="form-control-label" for="value">Value</label>
							<input type="text" class="form-control @error('value') is-invalid @enderror" id="value" wire:model="value" placeholder="Value atau isi">
							@if($errors->has('value'))
								<span class="invalid-feedback">{{ $errors->first('value') }}</span>
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

	<div wire:ignore.self class="modal fade" tabindex="-1" role="modal" id="uploadPhoto">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit logo perusahaan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form wire:submit.prevent="storeLogo">
					<div class="modal-body">
						<div class="form-group">
							<label class="form-control-label" for="logo">Pilih logo perusahaan</label>
							<input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo" wire:model="logo" placeholder="" accept="image/*">
							@if($errors->has('logo'))
								<span class="invalid-feedback">{{ $errors->first('logo') }}</span>
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
