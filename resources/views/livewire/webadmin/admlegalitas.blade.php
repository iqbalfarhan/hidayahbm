<div>
    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h3 class="card-title mb-0">Legalitas</h3>
                </div>
                <div class="col-md-6 text-right">
                    <button data-toggle="modal" data-target="#createLegalitas" class="btn btn-primary btn-sm"><i class="fa fa-plus mr-2"></i>Tambah</button>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-items-center">
                    <thead class="table-light">
                        <th scope="col">No</th>
                        <th scope="col">Nama Legalitas</th>
                        <th scope="col" class="text-center">File</th>
                        <th scope="col">Tanggal buat</th>
                        <th scope="col">Tampil</th>
                        <th scope="col" class="text-center">Action</th>
                    </thead>
                    <tbody>
                        @foreach($datas as $data)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->nama }}</td>
                            <td class="py-2 text-center">
                                <img src="{{ url($data->gambar) }}" alt="" class="avatar rounded-circle">
                            </td>
                            <td>{{ date('M d, Y h:i:s', strtotime($data->created_at)) }}</td>
                            <td>{{ $data->tampil }}</td>
                            <td class="py-2 text-center">
                                <button class="btn btn-primary btn-sm mx-0"><i class="fa fa-edit"></i></button>
                                <button wire:click="delete('{{ $data->id }}')" class="btn btn-danger btn-sm mx-0"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <div wire:ignore.self class="modal fade" tabindex="-1" role="dialog" id="createLegalitas">
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
                                Photo Preview:
                                <img src="{{ $namafile->temporaryUrl() }}" class="w-100">
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="tampil" wire:model="tampil">
                                    <label class="custom-control-label" for="tampil">Tampilkan legalitas di web?</label>
                                </div>
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

</div>