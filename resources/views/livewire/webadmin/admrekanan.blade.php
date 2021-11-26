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
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah rekanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="submit" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-control-label" for="nama">Nama Perusahaan</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" wire:model="nama" id="nama" placeholder="Nama Perusahaan">
                            @if($errors->has('nama'))
                                <span class="invalid-feedback">{{ $errors->first('nama') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="photo">Logo perusahaan</label>
                            <input type="file" class="form-control @error('photo') is-invalid @enderror" wire:model="photo" id="photo" placeholder="">
                            @if($errors->has('photo'))
                                <span class="invalid-feedback">{{ $errors->first('photo') }}</span>
                            @endif
                        </div>

                        @if ($photo == "")
                            <div class="form-group">
                                <label class="form-control-label" for="existPhoto">Atau pilih photo yang sudah ada</label>
                                <select class="form-control @error('existPhoto') is-invalid @enderror" wire:model="existPhoto" id="existPhoto">
                                    <option value=""></option>
                                    @foreach (gambarYangAda('/rekanan') as $gbr)
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" tabindex="-1" role="dialog" id="editRekanan">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit rekanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @if ($selected)
                <form wire:submit.prevent="updateRekanan({{ $selected }})" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-control-label" for="ednama">Nama Perusahaan</label>
                            <input type="text" class="form-control @error('ednama') is-invalid @enderror" wire:model="ednama" id="ednama" placeholder="Nama Perusahaan">
                            @if($errors->has('ednama'))
                                <span class="invalid-feedback">{{ $errors->first('ednama') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="edphoto">Logo perusahaan</label>
                            <input type="file" class="form-control @error('edphoto') is-invalid @enderror" wire:model="edphoto" id="edphoto" placeholder="">
                            @if($errors->has('edphoto'))
                                <span class="invalid-feedback">{{ $errors->first('edphoto') }}</span>
                            @endif
                        </div>

                        @if ($edphoto == "")
                            <div class="form-group">
                                <label class="form-control-label" for="existPhoto">Atau pilih photo yang sudah ada</label>
                                <select class="form-control @error('existPhoto') is-invalid @enderror" wire:model="existPhoto" id="existPhoto">
                                    <option value=""></option>
                                    @foreach (gambarYangAda('/rekanan') as $gbr)
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" tabindex="-1" role="dialog" id="deleteRekanan">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus rekanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @if ($selected)
                <form wire:submit.prevent="deleteRekanan({{ $selected }})" method="POST">
                    <div class="modal-body">
                        anda yakin akan menghapus rekanan ini?
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
