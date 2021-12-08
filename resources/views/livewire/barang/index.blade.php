<div>
    <div class="card shadow">
    	<div class="card-header">
    		<div class="row align-items-center">
    			<div class="col">
    				<h3 class="mb-0">
                        Data bahan makanan {{ $status ? "status ".$status : "" }} ({{ $datas->count() }})
                        <span wire:loading class="small text-muted ml-2"><i class="fa fa-spin fa-sync-alt"></i></span>
                    </h3>
    			</div>
    			<div class="col text-right">
    				<a href="#createBarang" data-toggle="modal" class="btn btn-sm btn-primary mx-0">Tambah</a>
                    <button wire:click="$set('filter', '{{ !$filter }}')" class="btn btn-sm btn-primary mx-0"><i class="fa fa-filter"></i></button>
    			</div>
    		</div>
    	</div>
        @if ($filter)
            <div class="card-body">
                <select class="btn btn-sm btn-secondary text-left" id="" wire:model="status">
                    <option value="">Semua status</option>
                    <option value="habis">Habis</option>
                    <option value="kurang">Kurang</option>
                    <option value="aman">Aman</option>
                </select>
            </div>
        @endif
    	<div class="table-responsive">
    		<table class="table align-items-center table-flush">
    			<thead class="thead-light">
    				<tr>
    					<th scope="col">No</th>
                        <th scope="col">Nama barang</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Minimal STOK</th>
    					<th scope="col">Status</th>
                        <th scope="col">SKU</th>
    					<th scope="col" class="text-center">Option</th>
    				</tr>
    			</thead>
    			<tbody>
    				@foreach ($datas as $data)
    					<tr>
                            <td>{{ $no++ }}</td>
    						<td><strong>{{ $data->nama }}</strong></td>
                            <td>{{ substr($data->keterangan, 0, 30) }}</td>
    						<td><strong>{{ $data->stok }}</strong> {{ $data->satuan }}</td>
                            <td><strong>{{ $data->min_stok }}</strong> {{ $data->satuan }}</td>
                            <td class="text-capitalize">
                                <i class="fa fa-dot-circle text-{{ $data->status_stok_color }} mr-1"></i>
                                {{ $data->status_stok }}
                            </td>
                            <td>
                                {{ $data->sku }}
                                {{-- @if ($data->sku)
                                    {!! DNS1D::getBarcodeHTML($data->sku, 'CODABAR') !!}
                                @endif --}}
                            </td>
    						<td class="p-2 text-center">
    							<button wire:click="edit({{ $data->id }})" class="btn btn-success btn-sm mx-0"><i class="fa fa-edit fa-fw"></i></button>
    							<button wire:click="riwayat({{ $data->id }})" class="btn btn-info btn-sm mx-0"><i class="fa fa-folder fa-fw"></i></button>
    							<button wire:click="delete({{ $data->id }})" class="btn btn-danger btn-sm mx-0"><i class="fa fa-trash fa-fw"></i></button>
    						</td>
    					</tr>
    				@endforeach
    			</tbody>
    		</table>
    	</div>
    </div>
    @livewire('barang.create')
    @livewire('barang.edit')
    @livewire('barang.riwayat')
    @livewire('barang.delete')
</div>