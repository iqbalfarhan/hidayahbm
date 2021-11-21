<div wire:ignore.self class="modal fade" tabindex="-1" role="modal" id="deleteBarang">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus barang</h5>
                <button type="button" class="close" wire:click="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Anda yakin akan menghapus barang ini dan semua transaksi tentang barang ini?</p>
                @if ($barang)
                    <table class="table table-sm table-bordered">
                        <tr>
                            <th>Nama barang</th>
                            <td>{{ $barang->nama }}</td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>{{ $barang->keterangan }}</td>
                        </tr>
                        <tr>
                            <th>Satuan</th>
                            <td>{{ $barang->satuan }}</td>
                        </tr>
                        <tr>
                            <th>SKU</th>
                            <td>{{ $barang->sku }}</td>
                        </tr>
                        <tr>
                            <th>Stok</th>
                            <td>{{ $barang->stok }}</td>
                        </tr>
                        <tr>
                            <th>Transaksi</th>
                            <td>{{ $barang->riwayat()->count() }} Transaksi</td>
                        </tr>
                    </table>
                @endif
            </div>
            <div class="modal-footer">
                <button wire:click="close" type="button" class="btn btn-secondary">Tutup</button>
                <button wire:click="hapus" type="submit" class="btn btn-danger">Hapus</button>
            </div>
        </div>
    </div>
</div>
    