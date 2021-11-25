<div>
    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h3 class="card-title mb-0">Photo File Manager</h3>
                </div>
                <div class="col-md-6 text-right">
                    <button data-toggle="modal" data-target="#uploadGambar" class="btn btn-primary btn-sm mx-0"><i class="fa fa-upload mr-2"></i>upload</button>
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
                    <div class="col-md-2 text-center" wire:click="$set('path', '{{ $dir }}')">
                        <div class="card shadow mb-3">
                            <div class="card-body">
                                <h1 class="display-1"><i class="fa fa-folder"></i></h1>
                                <small>{{ $dir }}</small>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif

                @foreach ($files as $file)
                    <div class="col-md-2 text-center">
                        <div class="card shadow mb-3">
                            <div class="card-body" wire:click="selectFile('{{ $file }}')">
                                <img src="{{ url('/storage/'.$file) }}" alt="" class="w-100">
                                <small>{{ $file }}</small>
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