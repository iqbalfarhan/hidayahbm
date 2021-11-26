<div>
    <div class="row">
        @foreach ($datas as $data)
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <a href="#!">
                        <img src="{{ url($data->gambar) }}" class="rounded shadow w-100 shadow-lg--hover">
                    </a>
                    <div class="pt-4 text-center">
                        <h5 class="h3 title">
                            <span class="d-block mb-1">{{ $data->nama }}</span>
                        </h5>
                        <div class="mt-3">
                            <button wire:click="edit({{ $data->id }})" class="btn btn-success btn-icon-only rounded-circle">
                                <i class="fa fa-edit"></i>
                            </button>
                            <button wire:click="deleteLegalitas({{ $data->id }})" class="btn btn-danger btn-icon-only rounded-circle">
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Buat Legalitas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="simpanLegalitas" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-control-label" for="nama">nama Legalitas</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" wire:model="nama" id="nama" placeholder="nama Legalitas">
                            @if($errors->has('nama'))
                            <span class="invalid-feedback">{{ $errors->first('nama') }}</span>
                            @endif
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="tampil" wire:model="edtampil">
                            <label class="custom-control-label" for="tampil">Tampilkan legalitas di web?</label>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="namafile">Upload file</label>
                                    <input type="file" class="form-control @error('namafile') is-invalid @enderror" wire:model="namafile" id="namafile" placeholder="namafile Legalitas" accept="image/*">
                                    @if($errors->has('namafile'))
                                    <span class="invalid-feedback">{{ $errors->first('namafile') }}</span>
                                    @endif
                                    <div class="form-text" wire:loading wire:target="namafile">loading...</div>
                                </div>

                                @if ($namafile)
                                <img src="{{ $namafile->temporaryUrl() }}" class="avatar rounded-circle">
                                @endif
                            </div>
                            <div class="col-md-6">
                                @if ($namafile == "")
                                <div class="form-group">
                                    <label class="form-control-label" for="existPhoto">Atau pilih photo yang sudah ada</label>
                                    <select class="form-control @error('existPhoto') is-invalid @enderror" wire:model="existPhoto" id="existPhoto">
                                        <option value=""></option>
                                        @foreach (gambarYangAda('/legalitas') as $gbr)
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
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" tabindex="-1" role="dialog" id="editLegalitas">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Buat Legalitas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="updateLegalitas" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-control-label" for="nama">nama Legalitas</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" wire:model="ednama" id="nama" placeholder="nama Legalitas">
                            @if($errors->has('nama'))
                            <span class="invalid-feedback">{{ $errors->first('nama') }}</span>
                            @endif
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="tampil" wire:model="edtampil">
                            <label class="custom-control-label" for="tampil">Tampilkan legalitas di web?</label>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="ednamafile">Upload file</label>
                                    <input type="file" class="form-control @error('ednamafile') is-invalid @enderror" wire:model="ednamafile" id="ednamafile" placeholder="ednamafile Legalitas" accept="image/*">
                                    @if($errors->has('ednamafile'))
                                    <span class="invalid-feedback">{{ $errors->first('ednamafile') }}</span>
                                    @endif
                                    <div class="form-text" wire:loading wire:target="ednamafile">loading...</div>
                                </div>

                                @if ($ednamafile)
                                <img src="{{ $ednamafile->temporaryUrl() }}" class="avatar rounded-circle">
                                @endif
                            </div>
                            <div class="col-md-6">
                                @if ($ednamafile == "")
                                <div class="form-group">
                                    <label class="form-control-label" for="existPhoto">Atau pilih photo yang sudah ada</label>
                                    <select class="form-control @error('existPhoto') is-invalid @enderror" wire:model="existPhoto" id="existPhoto">
                                        <option value=""></option>
                                        @foreach (gambarYangAda('/legalitas') as $gbr)
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
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" tabindex="-1" role="dialog" id="deleteLegalitas">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi penghapusan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @if ($selected)
                <div class="modal-body">
                    <p>Anda yakin akan menghapus legalitas ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button wire:click="delete({{ $selected }})" type="submit" class="btn btn-danger">Hapus</button>
                </div>
                @endif
            </div>
        </div>
    </div>


</div>