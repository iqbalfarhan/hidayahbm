<div wire:ignore.self class="modal fade" tabindex="-1" role="dialog" id="deleteAlat">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus alat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @if ($alat)
            <form wire:submit.prevent="hapus" method="POST">
                @csrf
                <div class="modal-body">
                    <p>Anda yakin akan menghapus alat ini?</p>
                    <table class="table table-sm table-bordered">
                        <tr>
                            <th>Nama alat</th>
                            <td>{{ $alat->nama }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah alat</th>
                            <td>{{ $alat->jumlah }}</td>
                        </tr>
                        <tr>
                            <th>Kode alat</th>
                            <td>{{ $alat->kode }}</td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
            @endif
        </div>
    </div>
</div>
