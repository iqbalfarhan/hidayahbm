<div class="card shadow">
    <div class="card-header">
        <h3 class="mb-0">Detail pemasukan</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-sm">
            <tr>
                <th>Tanggal</th>
                <td>{{ $data->tanggal }}</td>
            </tr>
            <tr>
                <th>di Input oleh</th>
                <td>{{ $data->user->name }}</td>
            </tr>
            <tr>
                <th>keterangan</th>
                <td>{{ $data->keterangan }}</td>
            </tr>
            <tr>
                <th>nominal</th>
                <td>Rp. <strong>{{ textNumber($data->nominal) }}</strong></td>
            </tr>
            <tr>
                <th>Terbayar</th>
                <td>
                    Rp. <strong>{{ textNumber($data->terbayar) }}</strong>
                    @if ($data->status == "kelebihan")
                        (kelebihan bayar Rp. {{ textNumber($data->terbayar - $data->nominal)  }})
                    @endif
                </td>
            </tr>
            <tr>
                <th>jenis</th>
                <td>pembayaran {{ $data->jenis }}</td>
            </tr>
            <tr>
                <th>status</th>
                <td>
                    @if ($data->status == "lunas")
                        <span class="badge badge-success">{{ $data->status }}</span>
                    @elseif ($data->status == "blm lunas")
                        <span class="badge badge-warning">{{ $data->status }}</span>
                    @else
                        <span class="badge badge-danger">{{ $data->status }}</span>
                    @endif
                </td>
            </tr>
        </table>
    </div>
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Transaksi</h3>
            </div>
            <div class="col text-right">
                <a href="#createTransaksi" data-toggle="modal" class="btn btn-sm btn-primary">Tambah transaksi</a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jenis transaksi</th>
                    <th scope="col">Nominal</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col" class="text-center">Option</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data->transaksi() as $trn)
                <tr>
                    <td><strong>{{ date('d M Y', strtotime($trn->tanggal)) }}</strong></td>
                    <td>
                        <span class="badge badge-{{ $trn->jenis == "masuk" ? "success" : "warning" }}">{{ $trn->jenis == "masuk" ? "Pemasukan" : "Pengeluaran" }}</span>
                    </td>
                    <td class="text-number">{{ textNumber($trn->nominal) }}</td>
                    <td>{{ $trn->keterangan }}</td>
                    <td class="p-2 text-center">
                        <button class="btn btn-primary btn-sm mx-0"><i class="fa fa-list"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @livewire('finance.transaksi.create', ['pemasukan_id' => $data->id])
</div>