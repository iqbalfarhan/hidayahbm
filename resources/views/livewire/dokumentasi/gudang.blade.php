<div class="row mb-4">
	<div class="col-md-8">
				@foreach ($datas as $num => $data)
		<div class="card shadow">
			<div class="card-header">
				<h3 class="card-title text-primary mb-0" id="gdg{{ $num }}">
						{{ $num+1 }}. {{ $data }}
					</h3>
			</div>
			<div class="card-body">
				<div class="mb-5">
					<p>
						Some placeholder content for the first accordion panel. This panel is shown by default, thanks to the <code>.show</code> class. Lorem ipsum dolor, sit amet consectetur, adipisicing elit. Ipsam, illo rerum nemo architecto consequatur ab suscipit, magnam quos, vero nobis ratione totam minus qui nostrum eius distinctio. Quae, veritatis? Mollitia.
					</p>

					<p>Lorem, ipsum dolor sit, amet consectetur adipisicing elit. In voluptate quae ipsa unde soluta voluptatum esse nobis corporis voluptatibus iure doloremque, vitae magni laboriosam, deserunt tempore? Neque quaerat minus, esse?</p>
				</div>
			</div>
		</div>
				@endforeach
	</div>
	<div class="col-md-4">
		<div class="card sticky-top">
			<div class="card-header">
				<h3 class="card-title mb-0">List Panduan</h3>
			</div>
			<div class="card-body p-0" style="overflow-y: auto; max-height: 80vh">
				<div class="list-group">
					@foreach ($datas as $key => $data)
					<a href="#gdg{{ $key }}" class="list-group-item"> {{ $key+1 }}. {{ $data }}</a>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>