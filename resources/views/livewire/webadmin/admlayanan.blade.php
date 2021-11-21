<div>
    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h3 class="card-title mb-0">Segment bisnis (Layanan)</h3>
                </div>
                <div class="col-md-6 text-right">
                    <button data-toggle="modal" data-target="#createLayanan" class="btn btn-primary btn-sm">tambah baru</button>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-light">
                        <th scope="col">No</th>
                        <th scope="col">Nama Layanan</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Icon</th>
                        <th scope="col" class="text-center">Action</th>
                    </thead>
                    <tbody>
                        @foreach($datas as $data)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->keterangan }}</td>
                            <td><i class="{{ $data->icon }}"></i> {{ $data->icon }}</td>
                            <td class="p-2 text-center">
                                <button wire:click="edit({{ $data->id }})" class="btn btn-success btn-sm mx-0"><i class="fa fa-edit"></i></button>
                                <button wire:click="delete({{ $data->id }})" class="btn btn-danger btn-sm mx-0"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <div wire:ignore.self class="modal fade" tabindex="-1" role="dialog" id="createLayanan">
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
                            <label for="nama">Nama layanan</label>
                            <input type="text" class="form-control" wire:model="nama" id="nama" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" class="form-control" wire:model="keterangan" id="keterangan" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="icon">class icon</label>
                            <input type="text" class="form-control" wire:model="icon" id="icon" placeholder="">
                            <small class="form-text">https://icons.getbootstrap.com/ contoh : bi bi-alarm-fill</small>
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
                            <label for="nama">Nama layanan</label>
                            <input type="text" class="form-control" wire:model="ednama" id="nama" placeholder="">
                            @if($errors->has('edname'))
                            <span class="invalid-feedback">{{ $errors->first('edname') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" class="form-control" wire:model="edketerangan" id="keterangan" placeholder="">
                            @if($errors->has('edketerangan'))
                            <span class="invalid-feedback">{{ $errors->first('edketerangan') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="icon">class icon</label>
                            <input type="text" class="form-control" wire:model="edicon" id="icon" placeholder="">
                            @if($errors->has('edicon'))
                            <span class="invalid-feedback">{{ $errors->first('edicon') }}</span>
                            @endif
                            <small class="form-text">https://icons.getbootstrap.com/ contoh : bi bi-alarm-fill</small>
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
