<div>
    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h3 class="card-title mb-0">Gallery view</h3>
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
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-items-center">
                    <thead class="table-light">
                        <th scope="col">Preview</th>
                        <th scope="col">File name</th>
                        <th scope="col">Copy path</th>
                        <th scope="col" class="text-center">Action</th>
                    </thead>
                    <tbody>
                        @foreach($files as $file)
                        <tr>
                            <td class="py-2 text-center">
                                <img src="{{ url('/storage/'.$file) }}" alt="" class="avatar">
                            </td>
                            <td>{{ $file }}</td>
                            <td>/storage/{{ $file }}</td>
                            <td class="py-2 text-center">
                                <button class="btn btn-info btn-sm mx-0"><i class="fa fa-copy"></i></button>
                                <button wire:click="hapusFile('{{ $file }}')" class="btn btn-danger btn-sm mx-0"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <div wire:ignore.self class="modal fade" tabindex="-1" role="dialog" id="uploadGambar">
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

</div>