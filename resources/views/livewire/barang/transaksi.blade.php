<div>
	<div class="card shadow">
		<div class="card-header">
			<h3 class="mb-0">Transaksi {{ $jenis == "tambah" ? "penambahan" : "pengurangan" }} barang</h3>
		</div>
		<div class="card-body pb-0">
			<div class="row">
				<div class="col-md-6">
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
				<div class="col-md-6">
					<div class="form-group">
						<label class="form-control-label" for="nonsku">Barang tanpa SKU / Cari dengan nama</label>
						<input type="search" class="form-control @error('nonsku') is-invalid @enderror" id="nonsku" wire:model="nonsku" placeholder="tulis nama barang disini">
						@if($errors->has('nonsku'))
						<span class="invalid-feedback">{{ $errors->first('nonsku') }}</span>
						@endif
						@if ($nonsku)
						@foreach ($listnonsku as $lns)
						<button type="button" class="btn-icon-clipboard" wire:click="addToList({{ $lns->id }})">
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
	</div>
</div>