<div>
    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h3 class="card-title mb-0">Kegiatan</h3>
                </div>
                <div class="col-md-6 text-right">
                    <button data-toggle="modal" data-target="#createKegiatan" class="btn btn-primary btn-sm"><i class="fa fa-plus mr-2"></i>Tambah</button>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-items-center">
                    <thead class="table-light">
                        <th scope="col">No</th>
                        <th scope="col">Judul Kegiatan</th>
                        <th scope="col">Tag</th>
                        <th scope="col" class="text-center">Photo</th>
                        <th scope="col">Tanggal buat</th>
                        <th scope="col" class="text-center">Action</th>
                    </thead>
                    <tbody>
                        @foreach($datas as $data)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td class="py-2">
                                <strong>{{ $data->judul }}</strong><br>
                                {{ substr($data->isi, 0, 50) }}
                            </td>
                            <td>{{ $data->tag }}</td>
                            <td class="py-2 text-center">
                                <img src="{{ url($data->gambar) }}" alt="" class="avatar rounded-circle">
                            </td>
                            <td>{{ date('M d, Y h:i:s', strtotime($data->created_at)) }}</td>
                            <td class="py-2 text-center">
                                <button wire:click="edit('{{ $data->id }}')" class="btn btn-primary btn-sm mx-0"><i class="fa fa-edit"></i></button>
                                <button wire:click="delete('{{ $data->id }}')" class="btn btn-danger btn-sm mx-0"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <div wire:ignore.self class="modal fade" tabindex="-1" role="dialog" id="create">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Buat kegiatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="simpanKegiatan" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-control-label" for="judul">Judul kegiatan</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" wire:model="judul" id="judul" placeholder="Judul kegiatan">
                            @if($errors->has('judul'))
                            <span class="invalid-feedback">{{ $errors->first('judul') }}</span>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="photo">Upload file</label>
                                    <input type="file" class="form-control @error('photo') is-invalid @enderror" wire:model="photo" id="photo" placeholder="photo Legalitas" accept="image/*">
                                    @if($errors->has('photo'))
                                    <span class="invalid-feedback">{{ $errors->first('photo') }}</span>
                                    @endif
                                    <div class="form-text" wire:loading wire:target="photo">loading...</div>
                                </div>

                                @if ($photo)
                                <img src="{{ $photo->temporaryUrl() }}" class="avatar rounded-circle">
                                @endif
                            </div>
                            <div class="col-md-6">
                                @if ($photo == "")
                                <div class="form-group">
                                    <label class="form-control-label" for="existPhoto">Atau pilih photo yang sudah ada</label>
                                    <select class="form-control @error('existPhoto') is-invalid @enderror" wire:model="existPhoto" id="existPhoto">
                                        <option value=""></option>
                                        @foreach (gambarYangAda('/kegiatan') as $gbr)
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
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="tag">Tag kegiatan / kategori</label>
                                    <input type="text" class="form-control @error('tag') is-invalid @enderror" wire:model="tag" id="tag" placeholder="">
                                    @if($errors->has('tag'))
                                    <span class="invalid-feedback">{{ $errors->first('tag') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                @foreach ($tags as $tg)
                                    <button type="button" wire:click="$set('tag', '{{ $tg }}')" class="btn btn-primary btn-sm">{{ $tg }}</button>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="isi">Isi Article kegiatan</label>
                            <textarea class="form-control @error('isi') is-invalid @enderror" wire:model="isi" id="isi" placeholder="isi article kegiatan" rows="10"></textarea>
                            @if($errors->has('isi'))
                            <span class="invalid-feedback">{{ $errors->first('isi') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" tabindex="-1" role="dialog" id="editKegiatan">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit kegiatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="updateKegiatan" method="POST">
                    @if ($selected)
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="form-control-label" for="judul">Judul kegiatan</label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror" wire:model="judul" id="judul" placeholder="Judul kegiatan">
                                @if($errors->has('judul'))
                                <span class="invalid-feedback">{{ $errors->first('judul') }}</span>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="photo">Upload file</label>
                                        <input type="file" class="form-control @error('photo') is-invalid @enderror" wire:model="photo" id="photo" placeholder="photo Legalitas" accept="image/*">
                                        @if($errors->has('photo'))
                                        <span class="invalid-feedback">{{ $errors->first('photo') }}</span>
                                        @endif
                                        <div class="form-text" wire:loading wire:target="photo">loading...</div>
                                    </div>

                                    @if ($photo)
                                    <img src="{{ $photo->temporaryUrl() }}" class="avatar rounded-circle">
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    @if ($gambar)
                                        <img src="{{ url($gambar) }}" alt="" class="avatar">
                                    @endif
                                    @if ($photo == "")
                                    <div class="form-group">
                                        <label class="form-control-label" for="existPhoto">Atau pilih photo yang sudah ada</label>
                                        <select class="form-control @error('existPhoto') is-invalid @enderror" wire:model="existPhoto" id="existPhoto">
                                            <option value=""></option>
                                            @foreach (gambarYangAda('/kegiatan') as $gbr)
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
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="tag">Tag kegiatan / kategori</label>
                                        <input type="text" class="form-control @error('tag') is-invalid @enderror" wire:model="tag" id="tag" placeholder="">
                                        @if($errors->has('tag'))
                                        <span class="invalid-feedback">{{ $errors->first('tag') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    @foreach ($tags as $tg)
                                        <button type="button" wire:click="$set('tag', '{{ $tg }}')" class="btn btn-primary btn-sm">{{ $tg }}</button>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="isi">Isi Article kegiatan</label>
                                <textarea class="form-control @error('isi') is-invalid @enderror" wire:model="isi" id="isi" placeholder="isi article kegiatan" rows="10"></textarea>
                                @if($errors->has('isi'))
                                <span class="invalid-feedback">{{ $errors->first('isi') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" tabindex="-1" role="dialog" id="deleteKegiatan">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="deleteKegiatan" method="POST">
                    @csrf
                    <div class="modal-body">
                        <p>Anda yakin akan menghapus kegiatan ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
        

</div>