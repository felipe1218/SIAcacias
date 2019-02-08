<!DOCTYPE html>
<html>
	<head>
		<title>Editar publicaci&oacute;n</title>
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<script src="{{ asset('js/app.js') }}"></script>
	</head>
	<body>
		<center>
			<div  style="background: #F3F2F2; margin: 10px; padding: 10px; border-radius: 10px; width: 600px;">				
				<h2>Gestión de publicaciones</h2>					
				</br>
				<form class="form-group" method="PUT" action="/publicaciones/actualizar/{{$publicacion->id}}">
					<table>
						<tr>
							<td><label>Publicacion:</label></td>
							<td><label>{{$publicacion->titulo}}</label></td>
						</tr>
						<tr>
							<td><label>Resumen:</label></td>
							<td><input type="text" name="resumen" class="form-group"></td>
						</tr>
						<tr>
							<td><label>Texto:</label></td>
							<td><textarea name="texto"></textarea></td>
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