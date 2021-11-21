<div>
	<div wire:ignore.self class="modal fade" tabindex="-1" role="modal" id="editUser">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit user {{ $name }}</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form wire:submit.prevent="update">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="form-control-label" for="name">Nama lengkap</label>
									<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" wire:model="name" placeholder="Nama">
									@if($errors->has('name'))
									<span class="invalid-feedback">{{ $errors->first('name') }}</span>
									@endif
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="form-control-label" for="namapendek">Nama pendek</label>
									<input type="text" class="form-control @error('namapendek') is-invalid @enderror" id="namapendek" wire:model="namapendek" placeholder="Nama">
									@if($errors->has('namapendek'))
									<span class="invalid-feedback">{{ $errors->first('namapendek') }}</span>
									@endif
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="form-control-label" for="username">Username login</label>
									<input type="text" class="form-control @error('username') is-invalid @enderror" id="username" wire:model="username" placeholder="username">
									@if($errors->has('username'))
									<span class="invalid-feedback">{{ $errors->first('username') }}</span>
									@endif
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="form-control-label" for="telegram_id">Telegram chat id</label>
									<input type="text" class="form-control @error('telegram_id') is-invalid @enderror" id="telegram_id" wire:model="telegram_id" placeholder="telegram ID">
									@if($errors->has('telegram_id'))
									<span class="invalid-feedback">{{ $errors->first('telegram_id') }}</span>
									@endif
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="form-control-label">Akses admin</label>
									<div class="custom-control custom-checkbox mb-3">
										<input class="custom-control-input @error('admin') is-invalid @enderror" wire:model="admin" id="admin" type="checkbox">
										<label class="custom-control-label" for="admin">Set sebagai admin</label>
										@if($errors->has('admin'))
										<span class="invalid-feedback">{{ $errors->first('admin') }}</span>
										@endif
									</div>
								</div>
							</div>
						</div>
						
						<div class="card">
							<div class="card-body">
								ubah password user ke : <b><i>password</i></b><br>
								<button wire:click="resetPassword" type="button" class="btn btn-default btn-sm mt-3"><i class="fa fa-key mr-2"></i>Reset Password</button>
							</div>
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" wire:click="closeModal" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>

</div>