<!DOCTYPE html>
<html>
	<head>
		<link href="{{ asset('css/inicioTuristas.css') }}" rel="stylesheet">
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<script src="{{ asset('js/app.js') }}"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Bevan" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
		<title>Las Acacias Coffee Farm</title>
	</head>
	<body>
		<div class="background-acacias m-0 p-0">
			<div  class="col-md-12">
				<div class="text-center titulo">
					<h1 class="m-0">Las acacias</h1>
					<h3>coffee farm</h3>
				</div>
				<div class="text-center idioma">
					<form class="form-group" method="GET" action="/turistasLenguaje">
					<label>Idioma / Language</label>
					<select name="idioma">
						<option value="0">Español</option>
						<option value="1">English</option>
					</select>
					<button type="submit" class="btn btn-primary">Aplicar / Apply</button>
					</form>
				</div>
			</div>
			<div class="col-md-12">
				<div class="container text-white">
					<div class="bg-wrapper pb-3 ml-auto mr-auto">
						<div class="row">
							<div class="col-md-3 m-2">
								<div class="bg-form">
									@foreach($listadoPublicaciones as $publicacion)
										<h2 class="titulo" style="text-transform: uppercase;">{{$publicacion->titulo}}</h2>
										<p class="cuerpo m-0"><i class="fas fa-calendar-alt"></i> {{$publicacion->created_at}}</p>
										<p class="cuerpo"><i class="fas fa-pencil-alt"></i> {{$publicacion->texto}}</p>
									@endforeach
								</div>
							</div>
						</div>
					</div>		
				</div>	
			</div>
			<div class="col-md-12 pt-2 pb-3">
				<div class="container text-white cuerpo">
					<div class="bg-wrapper pb-3">
						<h2 class="ml-1">Por favor déjanos un comentario, es de suma importancia para nosotros / Please leave us a comment, it is very important for us</h2>
						<div class="bg-form mr-auto ml-auto" style="width: 700px;">
							<div class="text-center p-1">
								<form class="form-group" method="POST" action="/comentarios/registrar">
								    @csrf
									<div class="wrapper-form form-h">
										<label>Tu nombre / Your name:</label>
										<div class="form-group">
											<input type="text" name="nombre_turista" class="form-group" style="width: 300px">
										</div>
										<label>Comentario / Commentary:</label>
										<div class="form-group mr-auto ml-auto" style="width: 50% !important;">
											<textarea class="form-control" name="texto" rows="2"></textarea>
										</div>
										<button type="submit" class="btn btn-primary">Registrar comentario / Write comment</button>
									</div>
								</form>
							</div>	
						</div>
					</div>		
				</div>					
			</div>
			<footer>
				<div class="text-center" style="bottom: 0;" >
					<p class="text-white m-0">Siguenos en redes sociales:</p>
					<div style="font-size: 30px;">
						<a href="" ><i class="fab fa-facebook" style="color: #3b5999"></i></a>
						<a href="https://www.instagram.com/las_acacias_coffee_farm/"><i class="fab fa-instagram" style="color: #e4405f"></i></a>
					</div>
					<p class="text-white m-0"><i class="far fa-copyright"></i> Las acacias coffee farm-2018</p>
				</div>
			</footer>	
		</div>
	</body>
</html>
