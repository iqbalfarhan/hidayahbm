<div>
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-header border-0">
                    <h3 class="mb-0">Edit Profile</h3>
                </div>
                <form wire:submit.prevent="updateUser">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-control-label" for="name">Nama lengkap</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" wire:model="name" placeholder="Nama user">
                            @if($errors->has('name'))
                            <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="username">Username</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" wire:model="username" placeholder="">
                                    @if($errors->has('username'))
                                    <span class="invalid-feedback">{{ $errors->first('username') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="telegram_id">Telegram ID</label>
                                    <input type="text" class="form-control @error('telegram_id') is-invalid @enderror" id="telegram_id" wire:model="telegram_id" placeholder="">
                                    @if($errors->has('telegram_id'))
                                    <span class="invalid-feedback">{{ $errors->first('telegram_id') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <hr>
                        
                        
                        <div class="form-group">
                            <label class="form-control-label" for="newpass">Password</label>
                            <input type="password" class="form-control @error('newpass') is-invalid @enderror" id="newpass" wire:model="newpass" placeholder="isi bila ingin merubah password">
                            @if($errors->has('newpass'))
                            <span class="invalid-feedback">{{ $errors->first('newpass') }}</span>
                            @endif
                        </div>


                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary"><i class="fa fa-check mr-2"></i>Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header border-0">
                    <h3 class="mb-0">Upload Photo</h3>
                </div>
                <form wire:submit.prevent="updatePhoto">
                    <div class="card-body">
                        <img src="{{ $photo ? $photo->temporaryUrl() : url($prev_photo) }}" alt="" class="rounded-circle w-100">
                        <div class="form-group">
                            <label class="form-control-label" for="photo">Photo</label>
                            <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" wire:model="photo" placeholder="" accept="image/*">
                            @if($errors->has('photo'))
                            <span class="invalid-feedback">{{ $errors->first('photo') }}</span>
                            @endif
                        </div>

                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary"><i class="fa fa-check mr-2"></i>Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>