<div class="card">
	<div class="card-header">
		Productos
	</div>
	<div class="card-body">
		<div class="row">
			@foreach($productos as $producto)
				<div class="col-md-4">
					{{ $producto['name'] }}
				</div>
				<div class="col-md-4 text-right">
					{{ $producto['price'] }}
				</div>
			@endforeach
		</div>
	</div>
</div>