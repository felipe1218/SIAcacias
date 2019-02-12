<?php

namespace lasAcaciasCoffeeFarm\Http\Controllers;

use Illuminate\Http\Request;
use lasAcaciasCoffeeFarm\User;
use lasAcaciasCoffeeFarm\producto;
use lasAcaciasCoffeeFarm\hospedaje;
use lasAcaciasCoffeeFarm\tiquete;
use lasAcaciasCoffeeFarm\publicacion;
use lasAcaciasCoffeeFarm\publicacionIngles;
use lasAcaciasCoffeeFarm\comentario;
use lasAcaciasCoffeeFarm\venta_producto;
use lasAcaciasCoffeeFarm\venta_tour;
use Illuminate\Support\Facades\DB;

class ControladorInicioSesion extends Controller
{
    	public function store(Request $request){

		//Listamos todos los usuarios
		
    	$consultaTiquetes = "select t.id, t.numero, t.precio, h.nombre, t.estado from tiquete t inner join hospedaje h where t.id_hospedaje = h.id";
        $listadoTiquetes = DB::select($consultaTiquetes);
		$listadoUsuarios = User::all();
		$listadoProductos = producto::all();
		$listadoHospedajes = hospedaje::all();
		$listadoPublicaciones = publicacion::all();
		$listadoPublicacionesIngles = publicacionIngles::all();
		$listadoComentarios = comentario::all();
		$listadoUsuarios = user::all();

		$consultaReportesProductos = "select p.nombre, v.cantidad, v.precio, v.created_at from venta_producto v inner join producto p where p.id = v.id_producto";

		$lista_venta_producto = DB::select($consultaReportesProductos);

		$consultaReportesTours = "select t.numero, v.precio, v.created_at from venta_tour v inner join tiquete t where t.estado = 'Vendido' and t.id = v.id_tiquete";

		$lista_venta_tours = DB::select($consultaReportesTours);


		//se recorre el listado de usuarios
		foreach ($listadoUsuarios as $usuario) {

			//se verifica que el usuario ingresado tenga un email y una contraseña correctos
			if ($usuario->email == $request->email && $usuario->password == $request->password) {

				//Si el usuario es un administrador se direcciona a la pantalla de administracion
				if ($usuario->tipo_usuario=='Administrador') {
					
					
					return view('inicioAdministracion', compact('listadoProductos', 'listadoHospedajes', 'listadoTiquetes', 'listadoPublicaciones', 'listadoComentarios', 'lista_venta_producto', 'lista_venta_tours', 'listadoPublicacionesIngles', 'listadoUsuarios'));
			

				//Si el usuario es un vendedor, se direcciona a la pantalla de ventas
				}elseif ($usuario->tipo_usuario=='Vendedor') {

					$tiquete = new tiquete();
        			$listadoHospedajes = hospedaje::all();
        			$consultaTiquetes = "select t.numero, t.precio, t.id from tiquete t where t.estado = 'No vendido'";
        
        			$listadoTiquetes = DB::select($consultaTiquetes);
        			$hospedaje = new hospedaje();
					
					return view('inicioVentas', compact('listadoProductos', 'listadoTiquetes', 'tiquete', 'listadoHospedajes'));
				

				}

			}	

		}

		//Si el usuario no es correcto, se direcciona a la misma página de inicio de sesión
		return view('inicioSesion');
		Session::flash('message-error','Usuario incorrecto');

	}
}

