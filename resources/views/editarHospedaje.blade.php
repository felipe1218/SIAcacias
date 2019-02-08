<!DOCTYPE html>
<html>
	<head>
		<title>Editar hospedaje</title>
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<script src="{{ asset('js/app.js') }}"></script>
	</head>
	<body>
		<center>
			<div  style="background: #F3F2F2; margin: 10px; padding: 10px; border-radius: 10px; width: 600px;">
					<h2>Gestión de hospedaje</h2>
					</br>						
				<form class="form-group" method="PUT" action="/hospedajes/actualizar/{{$hospedaje->id}}">						
					<table>
							<tr>
								<td><label>hospedaje:</label></td>
								<td><label>{{$hospedaje->nombre}}</label>
									<td><label>nombre:</label></td>
								<td><input type="text" name="nombre" class="form-group"></td></td>
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