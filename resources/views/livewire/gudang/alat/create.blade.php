<div>
    <div wire:ignore.self class="modal fade" tabindex="-1" role="modal" id="createAlat">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah alat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="submit">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-control-label" for="nama">Nama Alat</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" wire:model="nama" placeholder="Nama alat">
                            @if($errors->has('nama'))
                                <span class="invalid-feedback">{{ $errors->first('nama') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="jumlah">Jumlah alat</label>
                            <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" wire:model="jumlah" placeholder="Jumlah alat">
                            @if($errors->has('jumlah'))
                                <span class="invalid-feedback">{{ $errors->first('jumlah') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="kode">Kode Alat</label>
                            <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode" wire:model="kode" placeholder="">
                            @if($errors->has('kode'))
                                <span class="invalid-feedback">{{ $errors->first('kode') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
