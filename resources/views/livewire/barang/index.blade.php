<div>
    <div class="card shadow">
    	<div class="card-header border-0">
    		<div class="row align-items-center">
    			<div class="col">
    				<h3 class="mb-0">Data barang</h3>
    			</div>
    			<div class="col text-right">
    				<a href="#createBarang" data-toggle="modal" class="btn btn-sm btn-primary">Tambah Barang</a>
    			</div>
    		</div>
    	</div>
    	<div class="table-responsive">
    		<table class="table align-items-center table-flush">
    			<thead class="thead-light">
    				<tr>
    					<th scope="col">Nama barang</th>
    					<th scope="col">Keterangan</th>
    					<th scope="col">Stok</th>
                        <th scope="col">SKU</th>
    					<th scope="col" class="text-center">Option</th>
    				</tr>
    			</thead>
    			<tbody>
    				@foreach ($datas as $data)
    					<tr>
    						<td>{{ $data->nama }}</td>
    						<td>{{ $data->keterangan }}</td>
    						<td><strong>{{ $data->stok }}</strong> {{ $data->satuan }}</td>
                            <td>
                                @if ($data->sku)
                                    {!! DNS1D::getBarcodeHTML($data->sku, 'CODABAR') !!}
                                @endif
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