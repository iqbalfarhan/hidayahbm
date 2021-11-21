<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Data pengeluaran</h3>
            </div>
            <div class="col text-right">
                <a href="#createPengeluaran" data-toggle="modal" class="btn btn-sm btn-primary">Tambah pengeluaran</a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Nominal</th>
                    <th scope="col">Photo</th>
                    <th scope="col" class="text-center">Option</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <td><strong>{{ date('d M Y', strtotime($data->tanggal)) }}</strong></td>
                        <td>{{ $data->keterangan }}</td>
                        <td class="text-number">Rp. {{ textNumber($data->nominal) }}</td>
                        <td class="p-2">
                            <img src="{{ url($data->gambar) }}" alt="" class="avatar">
                        </td>
                        <td class="p-2 text-center">
                            <button class="btn btn-info btn-sm mx-0"><i class="fa fa-folder"></i></button>
                            <button class="btn btn-success btn-sm mx-0"><i class="fa fa-edit"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @livewire('finance.pengeluaran.create')
</div>