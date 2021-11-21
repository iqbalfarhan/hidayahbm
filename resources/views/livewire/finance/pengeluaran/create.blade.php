<div wire:ignore.self class="modal fade" tabindex="-1" role="modal" id="createPengeluaran">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah pengeluaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="submit">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-control-label" for="tanggal">Tanggal pengeluaran</label>
                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" wire:model="tanggal" placeholder="">
                        @if($errors->has('tanggal'))
                            <span class="invalid-feedback">{{ $errors->first('tanggal') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="nominal">Nominal</label>
                        <input type="number" class="form-control @error('nominal') is-invalid @enderror" id="nominal" wire:model="nominal" placeholder="nominal pengeluaran">
                        @if($errors->has('nominal'))
                            <span class="invalid-feedback">{{ $errors->first('nominal') }}</span>
                        @endif

                        @if ($nominal)
                            Rp. {{ textNumber($nominal) }}
                        @endif
                    </div>
                        
                    <div class="form-group">
                        <label class="form-control-label" for="keterangan">Keterangan</label>
                        <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" wire:model="keterangan" placeholder="keterangan createPengeluaran">
                        @if($errors->has('keterangan'))
                            <span class="invalid-feedback">{{ $errors->first('keterangan') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="photo">Photo / Bukti pengeluaran</label>
                        <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo" placeholder="">
                        <i class="small form-text">bukti bisa berupa nota pembelian</i>
                        @if($errors->has('photo'))
                            <span class="invalid-feedback">{{ $errors->first('photo') }}</span>
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
    