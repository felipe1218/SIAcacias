<!DOCTYPE html>
<html>
	<head>
		<title>Editar producto</title>
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<script src="{{ asset('js/app.js') }}"></script>
	</head>
	<body>
		<center>
			<div  style="background: #F3F2F2; margin: 10px; padding: 10px; border-radius: 10px; width: 600px;">				
				<h2>Gestión de productos</h2>					
				</br>
				<form class="form-group" method="PUT" action="/productos/actualizar/{{$producto->id}}">
					<table>
						<tr>
							<td><label>Producto:</label></td>
							<td><label>{{$producto->nombre}}</label></td>
						</tr>
						<tr>
							<td><label>Precio:</label></td>
							<td><input type="text" name="precio" class="form-group"></td>
						</tr>
						<tr>
							<td><label>Cantidad:</label></td>
							<td><input type="text" name="cantidad" class="form-group"></td>
						</tr>
						<tr>
							<div class="text-center">
								<td>{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}</td>
							</div>
						</tr>						
					</table>
				</form>
			</div>		
		</center>
	</body>
</html>