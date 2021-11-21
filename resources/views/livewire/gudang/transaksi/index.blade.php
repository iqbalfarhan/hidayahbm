<div>
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Riwayat transaksi {{ $tanggal == "" ? "hari ini" : "tanggal ".date('d M Y', strtotime($tanggal)) }}</h3>
                </div>
                <div class="col text-right">
                    <a href="#filterTanggal" data-toggle="modal" class="btn btn-sm btn-primary">Cari tanggal</a>
                    <button wire:click="prevDay" class="btn btn-sm btn-primary mx-0"><i class="fa fa-chevron-left fa-fw"></i></button>
                    <button wire:click="nextDay" class="btn btn-sm btn-primary mx-0"><i class="fa fa-chevron-right fa-fw"></i></button>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <!-- Projects table -->
            <table class="table align-items-center">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Nama barang</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Diinput oleh</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                        <tr>
                            <td><strong>{{ date('d M Y', strtotime($data->tanggal)) }}</strong></td>
                            <td>
                                <div class="badge {{ $data->jenis == "tambah" ? "badge-success" : "badge-warning" }}">
                                    <strong>{{ $data->jenis == "tambah" ? "Penambahan stok" : "Pengurangan stok" }}</strong>
                                </div>
                            </td>
                            <td>{{ $data->barang()->nama }}</td>
                            <td>{{ $data->keterangan }}</td>
                            <td>{{ $data->jumlah }} {{ $data->barang()->satuan }}</td>
                            <td>{{ $data->user()->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" tabindex="-1" role="modal" id="filterTanggal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Filter dengan tanggal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="filterTanggal">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-control-label" for="tanggal">Tanggal</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" wire:model="tanggal" placeholder="">
                            @if($errors->has('tanggal'))
                                <span class="invalid-feedback">{{ $errors->first('tanggal') }}</span>
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
