<div>
    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h3 class="card-title mb-0">Photo File Manager</h3>
                </div>
                <div class="col-md-6 text-right">
                    <select class="btn btn-sm mx-0 btn-primary" wire:model="filterpath">
                        <option value="">Pilih path</option>
                        @foreach ($dirs as $dir)
                        <option value="{{ $dir }}">/{{ $dir }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="card-body">
            {{ $selectedFile }}
            <div class="row">
                @if ($path == "")
                    @foreach ($dirs as $dir)
                    <div class="col-md-2 text-center mb-3" wire:click="$set('path', '{{ $dir }}')">
                        <div class="card shadow h-100">
                            <div class="card-body">
                                <h1 class="display-1"><i class="fa fa-folder"></i></h1>
                                <strong>{{ $dir }}</strong>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif

                @foreach ($files as $file)
                    <div class="col-md-2 text-center mb-3">
                        <div class="card shadow h-100">
                            <div class="card-body" wire:click="selectFile('{{ $file }}')">
                                <img src="{{ url('/storage/'.$file) }}" alt="" class="w-100 mb-3">
                                <strong>{{ $file }}</strong>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" tabindex="-1" role="dialog" id="create">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload gambar baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="storeFile" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="path">Path</label>
                            <select class="form-control" wire:model="path">
                                <option value="/">root path</option>
                                @foreach ($dirs as $dir)
                                <option value="{{ $dir }}">/{{ $dir }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="filename">Pilih file</label>
                            <input type="file" class="form-control" wire:model="filename" id="filename" placeholder="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" tabindex="-1" role="dialog" id="deleteFile">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus file</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @if ($selectedFile)
                    <div class="modal-body">
                        <p>Anda yakin akan menghapus file ini</p>
                        {{ $selectedFile }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="unsetSelectedFile" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" wire:click="hapusFile('{{ $selectedFile }}')" class="btn btn-danger">Hapus file</button>
                    </div>
                @endif
            </div>
        </div>
    </div>
        

</div>