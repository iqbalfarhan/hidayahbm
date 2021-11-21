<div class="card shadow">
	<div class="card-header border-0">
		<div class="row align-items-center">
			<div class="col">
				<h3 class="mb-0">Data user</h3>
			</div>
			<div class="col text-right">
				<a href="#createUser" class="btn btn-sm btn-primary" data-toggle="modal">Tambah user</a>
			</div>
		</div>
	</div>
	<div class="table-responsive">
		<!-- Projects table -->
		<table class="table align-items-center table-flush">
			<thead class="thead-light">
				<th scope="col">Photo</th>
				<th scope="col">Nama user</th>
				<th scope="col">Nama pendek</th>
				<th scope="col">Username</th>
				<th scope="col">Telegram ID</th>
				<th scope="col">Akses</th>
				<th scope="col" class="text-center">Option</th>
			</thead>
			<tbody>
				@foreach ($datas as $data)
					<tr>
						<td class="py-1">
							<img src="{{ url($data->gambar) }}" alt="" class="avatar rounded-circle">
						</td>
						<td>{{ $data->name }}</td>
						<td>{{ $data->namapendek }}</td>
						<td>{{ $data->username }}</td>
						<td>{{ $data->telegram_id }}</td>
						<td>{{ $data->admin == 1 ? "Admin" : "User" }}</td>
						<td class="p-2 text-center">
							<button wire:click="edit({{ $data->id }})"class="btn btn-success btn-sm mx-0"><i class="fa fa-edit fa-fw"></i></button>
							<button wire:click="delete({{ $data->id }})" class="btn btn-danger btn-sm mx-0"><i class="fa fa-trash fa-fw"></i></button>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	@livewire('user.create')
	@livewire('user.edit')
</div>