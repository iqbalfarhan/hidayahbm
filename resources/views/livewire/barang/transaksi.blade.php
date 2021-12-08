<div>
	<div class="card shadow">
		<div class="card-header">
			<button wire:click="$set('jenis', 'tambah')" class="btn {{ $jenis == "tambah" ? "btn-success" : "btn-secondary" }}">
				<i class="fa fa-plus mr-2"></i>Penambahan stok
			</button>
			<button wire:click="$set('jenis', 'kurang')" class="btn {{ $jenis == "kurang" ? "btn-success" : "btn-secondary" }}">
				<i class="fa fa-minus mr-2"></i>Pengurangan stok
			</button>
		</div>
	@if ($jenis)
		<div class="card-header">
			<div class="row">
				<div class="col-md-6">
					<h3 class="mb-0">Transaksi {{ $jenis == "tambah" ? "penambahan" : "pengurangan" }} stok barang</h3>
				</div>
				<div class="col-md-6 text-right">
					<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#help"><i class="fa fa-question"></i></button>
				</div>
			</div>
		</div>
		<div class="card-body pb-0">
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label class="form-control-label" for="sku">Scan Barcode (SKU)</label>
						<input type="search" class="form-control @error('sku') is-invalid @enderror" id="sku" wire:model="sku" placeholder="scan barcode barang" autofocus="true">
						@if($errors->has('sku'))
						<span class="invalid-feedback">{{ $errors->first('sku') }}</span>
						@endif

						@if ($sku)
						@if (App\Barang::where('sku', $sku)->count() == 0)
						<i class="text-danger">
							barang tidak terdaftar
						</i>
						@endif
						@endif
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="form-control-label" for="nonsku">Barang tanpa SKU / Cari dengan nama</label>
						<input type="search" class="form-control @error('nonsku') is-invalid @enderror" id="nonsku" wire:model="nonsku" placeholder="tulis nama barang disini">
						@if($errors->has('nonsku'))
						<span class="invalid-feedback">{{ $errors->first('nonsku') }}</span>
						@endif
						@if ($nonsku)
						@foreach ($listnonsku as $lns)
						<button type="button" class="py-2 btn-icon-clipboard" wire:click="addToList({{ $lns->id }})">
							<div class="row">
								<div class="col-md-6 d-flex">
									<h5 class="m-0">
										{{ $lns->nama }}<br>
										<small>{{ $lns->keterangan }}</small>
									</h5>
								</div>
								<div class="col-md-6 text-right small">
									<strong>Stok : {{ $lns->stok }} {{ $lns->satuan }}</strong>
								</div>
							</div>
						</button>
						@endforeach
						@endif
					</div>
				</div>
			</div>
		</div>
		@if ($barangs)
		<div class="card-body pt-0">
			<div class="table-responsive">
				<table class="table table-bordered align-items-center">
					<thead class="thead-light">
						<tr>
							<th scope="col">No</th>
							<th scope="col">Nama barang</th>
							<th scope="col">keterangan</th>
							<th scope="col">SKU</th>
							<th scope="col">stok sekarang</th>
							<th scope="col">QTY</th>
							<th scope="col" class="text-center">Option</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($barangs as $key => $brg)
						<tr>
							<td>{{ $no++ }}</td>
							<td>{{ $brg['nama'] }}</td>
							<td>{{ $brg['keterangan'] }}</td>
							<td>{{ $brg['sku'] }}</td>
							<td><strong>{{ $brg['stok'] }}</strong> {{ $brg['satuan'] }}</td>
							<td class="p-1 text-center">
								<input type="number" style="width: 80px;" min="1" class="form-control form-control-sm" wire:model="barangs.{{ $key }}.jumlah">
							</td>
							<td class="p-1 text-center">
								<button wire:click="unset('{{ $key }}')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<div class="card-body">
			<div class="form-group">
				<label class="form-control-label" for="keterangan">Keterangan transaksi</label>
				<textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" wire:model="keterangan" placeholder="misal : {{ $jenis == "tambah" ? "belanja tanggal 23 okt 2021" : "permintaan dapur tanggal 23 okt 2021" }}"></textarea>
				@if($errors->has('keterangan'))
				<span class="invalid-feedback">{{ $errors->first('keterangan') }}</span>
				@endif
			</div>

		</div>
		<div class="card-footer">
			<button wire:click="simpan" class="btn btn-primary"><i class="fa fa-check mr-2"></i>Simpan</button>
		</div>
		@endif
	@endif
	</div>

	<div class="modal fade" tabindex="-1" role="dialog" id="help">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Tentang halaman</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					Halaman ini digunakan untuk input transaksi bahan makanan. transaksi yang dimaksud adalah :
					<div class="mb-3"></div>
					<ul>
						<li><b>Penambahan stok bahan makanan</b> setelah pembelian bahan makanan baru dan </li>
						<li><b>Pengurangan stok bahan makanan</b> karena permintaan dapur atau lainnya.</li>
					</ul>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				</div>
			</div>
		</div>
	</div>

</div>