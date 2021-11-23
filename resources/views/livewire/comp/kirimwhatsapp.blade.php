<div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
	<form wire:submit.prevent="kirim" method="POST" role="form" class="php-email-form">
		@csrf
		<div class="row">
			<div class="form-group col-md-6">
				<label for="name">Nama anda</label>
				<input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Harus diisi">
				@error('name')
				<div class="text-danger small form-text">{{ $message }}</div>
				@enderror
			</div>
			<div class="form-group col-md-6">
				<label for="name">Subjek pesan</label>
				<input type="text" class="form-control @error('subject') is-invalid @enderror" wire:model="subject" id="subject" placeholder="Harus diisi">
				@error('subject')
				<div class="text-danger small form-text">{{ $message }}</div>
				@enderror
			</div>
		</div>
		<div class="form-group">
			<label for="name">Pesan</label>
			<textarea class="form-control @error('message') is-invalid @enderror" wire:model="message" rows="10" placeholder="Harus diisi"></textarea>
			@error('message')
			<div class="text-danger small form-text">{{ $message }}</div>
			@enderror
		</div>
		<div class="text-center">
			<button type="submit" class="btn btn-success">
				<span class="bi bi-whatsapp mr-2"></span> Kirim Whatsapp
			</button>
		</div>
	</form>
</div>
