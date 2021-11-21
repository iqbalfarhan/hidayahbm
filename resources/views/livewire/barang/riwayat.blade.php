<div wire:ignore.self class="modal fade" tabindex="-1" role="modal" id="riwayatBarang">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Riwayat Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @if ($datas)
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Inputer</th>
                        <th>keterangan</th>
                        <th>Tambah</th>
                        <th>Kurang</th>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->tanggal }}</td>
                            <td>{{ $data->user()->name }}</td>
                            <td>{{ $data->keterangan }}</td>
                            <td>
                                @if ($data->jenis == "tambah")
                                    <span class="text-success">{{ $data->jumlah }} {{ $data->barang()->satuan }}</span>
                                @endif
                            </td>
                            <td>
                                @if ($data->jenis == "kurang")
                                    <span class="text-danger">{{ $data->jumlah }} {{ $data->barang()->satuan }}</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
            <div class="modal-footer">
                <button wire:click="close" type="button" class="btn btn-secondary">Tutup</button>
            </div>
        </div>
    </div>
</div>
