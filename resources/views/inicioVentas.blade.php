<!DOCTYPE html>
<html>
	<head>
		<title>Ventas</title>
		<link href="{{ asset('css/inicioVentas.css') }}" rel="stylesheet">
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<script src="{{ asset('js/app.js') }}"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	</head>
	<body>
		<header style="border-bottom: 1px #343a40 solid;">
			<nav class="navbar fixed-top bg-dark">
				<h1 class="navbar-brand mr-1" style="color: #3490dc; font-size: 25px; margin: 0;"><i class="fa fa-file-invoice-dollar"></i> M&oacute;dulo de ventas</h1>
				<a href="/" onclick="clicSalir()" class="float-right mt-1" style="font-size: 25px; color:red !important"><span class="fa fa-power-off"></span></a>	
			</nav>
		</header>

		<div class="row pt-5 mt-3">
			<div class="col-md-2 bg-dark heightDiv">
				<ul class="nav navbar flex-column mt-3 text-center">
					<li class="nav-item">
						<a id="1" class="nav-link" href="#pantallaProductos" style="font-size: 18px;">	
							<p><i class="fa fa-store"></i> Venta de Productos</p>
						</a>
					</li>
					<li class="nav-item">
						<a id="2" class="nav-link" href="#pantallaHospedajes" style="font-size: 18px;">
							<p><i class="fa fa-window-restore"></i> Venta de tours</p>
						</a>
					</li>
				</ul>
			</div>	
			<div class="col colmd heightDiv" style="overflow-y: scroll;">
				<h2>Venta de productos</h2>
				<form class="form-group" method="PUT" action="/productos/vender">
					<div class="contenedor mt-3 mb-3 text-center">
						<table class="table">
							<thead class="thead-light">
								<th scope="col">Producto</th>
								<th scope="col">Precio</th>
								<th scope="col">inventario</th>
								<th scope="col">Cantidad</th>
								<th scope="col">Seleccionar</th>
							</thead>
							<tbody>
								@foreach($listadoProductos as $producto)
									@if($producto->cantidad<=5)
										<tr scope="row" style="background: rgba(255, 128, 0, 0.3);">
									
										<td>{{$producto->nombre}}</td>
										<td>{{$producto->precio}}</td>
										<td>{{$producto->cantidad}}</td>
										<td>
											<select name="cantidadVendida[]">
												<option value="0">0</option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="6">6</option>
												<option value="7">7</option>
												<option value="8">8</option>
												<option value="9">9</option>
												<option value="10">10</option>
											</select>
										</td>	
										<td><input type="checkbox" name="productosSeleccionados[]" value="{{$producto->id}}"></td>
									</tr>
									@else
									<tr scope="row">	
									<td>{{$producto->nombre}}</td>
										<td>{{$producto->precio}}</td>
										<td>{{$producto->cantidad}}</td>
										<td>
											<select name="cantidadVendida[]">
												<option value="0">0</option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="6">6</option>
												<option value="7">7</option>
												<option value="8">8</option>
												<option value="9">9</option>
												<option value="10">10</option>
											</select>
										</td>	
										<td><input type="checkbox" name="productosSeleccionados[]" value="{{$producto->id}}"></td>
									</tr>
									@endif					
								@endforeach											
							</tbody>							
						</table>
					</div>
					<center>
						<div class="container">
				    		@include('flash::message')
						</div>
						<button type="submit" class="btn btn-primary">Vender productos</button>
					</center>
				</form>	
				
				<h2>Ventas de Tours</h2>
				<form class="form-group" method="GET" action="/ventaTours/actualizar">
							

							<center><label>Seleccione hospedaje:</label>
							<select class="form-group" name="hospedaje">

								@foreach ($listadoHospedajes as $hospedaje)
									<option value="{{ $hospedaje['id'] }}">{{ $hospedaje['nombre'] }}</option>
								@endforeach	
							</select>
							<button type="submit" class="btn btn-primary">Buscar tiquetes</button></center>
					</form>	

					<form class="form-group" method="PUT" action="/tiquetes/vender">
					<div class="contenedor mt-3 mb-3 text-center">
						<table class="table">
							<thead class="thead-light">
								<th scope="col">Número</th>
								<th scope="col">Precio</th>						
								<th scope="col">Seleccionar</th>
							</thead>
							<tbody>
								@foreach($listadoTiquetes as $tiquete)
									<tr scope="row">
										<td>{{$tiquete->numero}}</td>
										<td>{{$tiquete->precio}}</td>
										<td><input type="checkbox" name="tiquetesSeleccionados[]" value="{{$tiquete->id}}"></td>
									</tr>						
								@endforeach				
							</tbody>	
						</table>
					</div>		
					<center>
						<div class="container">
							@include('flash::message')
						</div>
						<button type="submit" class="btn btn-primary">Vender tiquetes</button>
					</center>
				</form>
			</div>
		</div>
	</body>
</html>