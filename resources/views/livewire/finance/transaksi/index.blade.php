<div>
    <div class="card shadow">
    	<div class="card-header border-0">
    		<div class="row align-items-center">
    			<div class="col">
    				<h3 class="mb-0">Riwayat transaksi</h3>
    			</div>
    			<div class="col text-right">
    				<a href="#createTransaksi" data-toggle="modal" class="btn btn-sm btn-primary">Transaksi baru</a>
    			</div>
    		</div>
    	</div>
    	<div class="table-responsive">
    		<table class="table align-items-center table-flush">
    			<thead class="thead-light">
    				<tr>
    					<th scope="col">Tanggal</th>
    					<th scope="col">Jenis transaksi</th>
    					<th scope="col">Nominal</th>
    					<th scope="col">Keterangan</th>
    					<th scope="col">Referensi</th>
    					<th scope="col" class="text-center">Option</th>
    				</tr>
    			</thead>
    			<tbody>
    				@foreach ($datas as $data)
    					<tr>
    						<td><strong>{{ date('d M Y', strtotime($data->tanggal)) }}</strong></td>
    						<td>
    							@if ($data->jenis == "masuk")
    								<span class="badge badge-success">Pemasukan</span>
    							@else
    								<span class="badge badge-warning">Pengeluaran</span>
    							@endif
    						</td>
    						<td class="text-number">{{ textNumber($data->nominal) }}</td>
    						<td>{{ $data->keterangan }}</td>
    						<td>
                                @if ($data->pemasukan_id)
                                    <a href="{{ route('finance.pemasukan.show', $data->pemasukan) }}"><i class="fa fa-hashtag"></i><strong>{{ $data->pemasukan->kode }}</strong></a>
                                {{-- @elseif ($data->pengeluaran_id)
                                    <a href="{{ route('finance.pengeluaran.show', $data->pengeluaran) }}"><i class="fa fa-hashtag"></i><strong>{{ $data->pengeluaran->kode }}</strong></a> --}}
                                @elseif ($data->pinjaman_id)
                                    <a href="{{ route('finance.pinjaman.show', $data->pinjaman) }}"><i class="fa fa-hashtag"></i><strong>{{ $data->pinjaman->kode }}</strong></a>
                                @endif
                            </td>
    						<td class="p-2 text-center">
    							<button class="btn btn-primary btn-sm mx-0"><i class="fa fa-list"></i></button>
    						</td>
    					</tr>
    				@endforeach
    			</tbody>
    		</table>
    	</div>
    </div>
</div>