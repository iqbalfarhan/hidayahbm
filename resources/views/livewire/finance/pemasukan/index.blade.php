<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Pemasukan</h3>
            </div>
            <div class="col text-right">
                <a href="#createPemasukan" data-toggle="modal" class="btn btn-sm btn-primary mx-0">Tambah baru</a>
                <a href="#help" data-toggle="modal" class="btn btn-sm btn-default mx-0"><i class="fa fa-question"></i></a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <th scope="col">Kode</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Status</th>
                <th scope="col">Nominal</th>
                <th scope="col">Terbayar</th>
                <th scope="col" class="text-center">Option</th>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <td>{{ $data->kode }}</td>
                        <td><strong>{{ date('d M Y', strtotime($data->tanggal)) }}</strong></td>
                        <td>{{ $data->keterangan }}</td>
                        <td>
                            <span class="badge {{ $data->status == "lunas" ? "badge-success" : "badge-warning"}}">{{ $data->status }}</span>
                        </td>
                        <td class="text-number">Rp. {{ textNumber($data->nominal) }}</td>
                        <td class="text-number">Rp. {{ textNumber($data->terbayar) }}</td>
                        <td class="p-2 text-center">
                            <a href="{{ route('finance.pemasukan.show', $data) }}" class="btn btn-primary btn-sm mx-0"><i class="fa fa-folder"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@livewire('finance.pemasukan.create')

<div class="modal fade" tabindex="-1" role="modal" id="help">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Keterangan pemasukan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                data pemasukan berupa :
                <ul>
                    <li>data pesanan kastemer</li>
                    <li>data </li>
                </ul>

                semua data yang tersimpan berupa pemasukan uang
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
