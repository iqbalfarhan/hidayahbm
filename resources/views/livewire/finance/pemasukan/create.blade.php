<div wire:ignore.self class="modal fade" tabindex="-1" role="modal" id="createPemasukan">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Buat pemasukan baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="submit">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="kode">Kode Pemasukan</label>
                                <input type="string" class="form-control @error('kode') is-invalid @enderror" id="kode" wire:model="kode" placeholder="nomor nota atau yang lainnnya">
                                @if($errors->has('kode'))
                                <span class="invalid-feedback">{{ $errors->first('kode') }}</span>
                                @endif

                                <button type="button" class="btn btn-primary btn-sm mt-1" wire:click="genKode">Generate kode pemasukan</button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="tanggal">Tanggal input</label>
                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" wire:model="tanggal" placeholder="Tanggal input pemasukan">
                                @if($errors->has('tanggal'))
                                    <span class="invalid-feedback">{{ $errors->first('tanggal') }}</span>
                                @endif
                            </div>  
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="nominal">Nominal Total</label>
                                <input type="text" class="form-control @error('nominal') is-invalid @enderror" id="nominal" wire:model="nominal" placeholder="">
                                @if($errors->has('nominal'))
                                    <span class="invalid-feedback">{{ $errors->first('nominal') }}</span>
                                @endif

                                @if ($nominal)
                                    Rp {{ textNumber($nominal) }}
                                @endif
                            </div>
                                
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="jenis">Jenis pemasukan</label>
                                <select class="form-control @error('jenis') is-invalid @enderror" id="jenis" wire:model="jenis">
                                    <option value=""></option>
                                    <option value="bayar_nanti">bayar nanti</option>
                                    <option value="dp">dengan DP</option>
                                    <option value="lunas">Lunas</option>
                                </select>
                                @if($errors->has('jenis'))
                                    <span class="invalid-feedback">{{ $errors->first('jenis') }}</span>
                                @endif
                            </div>
                            @if ($jenis == "dp")
                                <div class="form-group">
                                    <label class="form-control-label" for="dp">Nominal DP</label>
                                    <input type="number" class="form-control @error('dp') is-invalid @enderror" id="dp" wire:model="dp" placeholder="">
                                    @if($errors->has('dp'))
                                        <span class="invalid-feedback">{{ $errors->first('dp') }}</span>
                                    @endif

                                    @if ($dp)
                                        Rp {{ textNumber($dp) }}
                                    @endif
                                </div>
                                    
                            @endif
                        </div>

                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="keterangan">Keterangan pemasukan</label>
                                <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" wire:model="keterangan" placeholder="keterangan tentang pemasukan"></textarea>
                                @if($errors->has('keterangan'))
                                    <span class="invalid-feedback">{{ $errors->first('keterangan') }}</span>
                                @endif
                            </div>
                        </div>
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
