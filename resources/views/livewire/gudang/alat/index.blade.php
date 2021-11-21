<div>
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">List aset peralatan</h3>
                </div>
                <div class="col text-right">
                    <a href="#createAlat" data-toggle="modal" class="btn btn-sm btn-primary">Tambah baru</a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Photo</th>
                        <th scope="col">nama Alat</th>
                        <th scope="col">jumlah</th>
                        <th scope="col">kode</th>
                        <th scope="col" class="text-center">Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td class="py-2">
                                <img src="{{ url($data->gambar) }}" alt="" class="avatar">
                            </td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->jumlah }}</td>
                            <td>{{ $data->kode }}</td>
                            <td class="p-2 text-center">
                                <button wire:click="edit({{ $data->id }})" class="btn btn-success btn-sm mx-0"><i class="fa fa-edit"></i></button>
                                <button wire:click="hapus({{ $data->id }})" class="btn btn-danger btn-sm mx-0"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @livewire('gudang.alat.create')
    @livewire('gudang.alat.edit')
    @livewire('gudang.alat.delete')
</div>
