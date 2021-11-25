<div>
    <div class="row">
        @foreach ($datas as $data)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <i class="display-1 mb-4 {{ $data->icon }}"></i>
                        <h3 class="text-primary">{{ $data->nama }}</h3>
                        <p>{{ $data->keterangan }}</p>

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
        @endforeach
    </div>

    <div wire:ignore.self class="modal fade" tabindex="-1" role="dialog" id="create">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah layanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="submit" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-control-label" for="nama">Nama layanan</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" wire:model="nama" id="nama" placeholder="Nama layanan">
                            @if($errors->has('nama'))
                                <span class="invalid-feedback">{{ $errors->first('nama') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="keterangan">Keterangan layanan</label>
                            <input type="text" class="form-control @error('keterangan') is-invalid @enderror" wire:model="keterangan" id="keterangan" placeholder="keterangan">
                            @if($errors->has('keterangan'))
                                <span class="invalid-feedback">{{ $errors->first('keterangan') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="icon">Icon layanan</label>
                            <input type="text" class="form-control @error('icon') is-invalid @enderror" wire:model="icon" id="icon" placeholder="contoh ni ni-spaceship">
                            @if($errors->has('icon'))
                                <span class="invalid-feedback">{{ $errors->first('icon') }}</span>
                            @endif

                            <a target="_blank" href="https://demos.creative-tim.com/argon-dashboard-pro/pages/components/icons.html" class="form-text">Nucleo icons</a>
                            <a target="_blank" href="https://fontawesome.com/v5.15/icons?d=gallery&p=2&s=brands,duotone,light,regular,solid&m=free" class="form-text">Font Awesome</a>
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

    <div wire:ignore.self class="modal fade" tabindex="-1" role="dialog" id="editLayanan">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit layanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @if ($selected)
                <form wire:submit.prevent="updateLayanan({{ $selected }})" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-control-label" for="ednama">Nama layanan</label>
                            <input type="text" class="form-control @error('ednama') is-invalid @enderror" wire:model="ednama" id="ednama" placeholder="Nama layanan">
                            @if($errors->has('ednama'))
                                <span class="invalid-feedback">{{ $errors->first('ednama') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="edketerangan">Keterangan layanan</label>
                            <input type="text" class="form-control @error('edketerangan') is-invalid @enderror" wire:model="edketerangan" id="edketerangan" placeholder="keterangan">
                            @if($errors->has('edketerangan'))
                                <span class="invalid-feedback">{{ $errors->first('edketerangan') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="edicon">Icon layanan</label>
                            <input type="text" class="form-control @error('edicon') is-invalid @enderror" wire:model="edicon" id="edicon" placeholder="contoh ni ni-spaceship">
                            @if($errors->has('edicon'))
                                <span class="invalid-feedback">{{ $errors->first('edicon') }}</span>
                            @endif

                            <a target="_blank" href="https://demos.creative-tim.com/argon-dashboard-pro/pages/components/icons.html" class="form-text">Nucleo icons</a>
                            <a target="_blank" href="https://fontawesome.com/v5.15/icons?d=gallery&p=2&s=brands,duotone,light,regular,solid&m=free" class="form-text">Font Awesome</a>
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

    <div wire:ignore.self class="modal fade" tabindex="-1" role="dialog" id="deleteLayanan">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit layanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @if ($selected)
                <form wire:submit.prevent="deleteLayanan({{ $selected['id'] }})" method="POST">
                    <div class="modal-body">
                        anda yakin akan menghapus layanan ini?
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
