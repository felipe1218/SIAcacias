<!DOCTYPE html>
<html>
	<head>
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<link href="{{ asset('css/inicioSesion.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<script src="{{ asset('js/app.js') }}"></script>
		<title>Inicio de sesi&oacute;n</title>
	</head>
	<body>
		<a href="/turistas" class="btn btn-warning">M&oacute;dulo para turistas</a>
		{!!Form::open(['route'=>'inicioSesion.store', 'method'=>'POST'])!!}
			<div class="card-sesion m-sesion">
				<h2 class="text-center">Las Acacias Coffee Farm</h2>
				<div class="mt-3">
					<label><i class="fa fa-user"></i> Ingrese su nombre de usuario:</label>
					<div class="form-group">
						{!!Form::text('email',null,['class'=>'form-control', 'placeholder'=>'usuario'])!!}	
					</div>
				</div>	
				<div class="mt-3">
					<label><i class="fa fa-lock"></i> Ingrese su contrase&ntilde;a:</label>
					<div class="form-group">
						{!!Form::password('password',['class'=>'form-control', 'placeholder'=>'contraseña'])!!}
					</div>
				</div>
				<div class="text-center">
					{!!Form::submit('Iniciar sesion',['class'=>'btn btn-primary'])!!}
				</div>
			</div>
				
		{!!Form::close()!!}
	</body>
</html>
