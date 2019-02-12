<?php

namespace lasAcaciasCoffeeFarm\Http\Controllers;

use Illuminate\Http\Request;
use lasAcaciasCoffeeFarm\producto;
use lasAcaciasCoffeeFarm\hospedaje;
use lasAcaciasCoffeeFarm\tiquete;
use lasAcaciasCoffeeFarm\publicacion;
use lasAcaciasCoffeeFarm\publicacionIngles;
use lasAcaciasCoffeeFarm\comentario;
use lasAcaciasCoffeeFarm\user;
use Illuminate\Support\Facades\DB;

class ControladorUsuarios extends Controller
{
    public function store(Request $request){

    	if (!((is_null($request->input('name')))||(is_null($request->input('email'))||(is_null($request->input('password')))))) {
    		
    		if ($request->input('tipo_usuario') == 1) {
    			$usuario = new user();
    			$usuario->tipo_usuario = 'Administrador';
	    		$usuario->name = $request->input('name');
	    		$usuario->email = $request->input('email');
	    		$usuario->password = $request->input('password');
	    		$usuario->save();
    		}elseif ($request->input('tipo_usuario') == 2) {
    			$usuario = new user();
    			$usuario->tipo_usuario = 'Vendedor';
	    		$usuario->name = $request->input('name');
	    		$usuario->email = $request->input('email');
	    		$usuario->password = $request->input('password');
	    		$usuario->save();
    		}

    			$listadoUsuarios = user::all();
    			$consultaTiquetes = "select t.id, t.numero, t.precio, h.nombre, t.estado from tiquete t inner join hospedaje h where t.id_hospedaje = h.id";
                $listadoTiquetes = DB::select($consultaTiquetes);
                $listadoProductos = producto::all();
                $listadoHospedajes = hospedaje::all();
                $listadoPublicaciones = publicacion::all();
                $listadoPublicacionesIngles = publicacionIngles::all();
                $listadoComentarios = comentario::all();

                $consultaReportesProductos = "select p.nombre, v.cantidad, v.precio, v.created_at from venta_producto v inner join producto p where p.id = v.id_producto";

                $lista_venta_producto = DB::select($consultaReportesProductos);

                $consultaReportesTours = "select t.numero, v.precio, v.created_at from venta_tour v inner join tiquete t where t.estado = 'Vendido' and t.id = v.id_tiquete";

                $lista_venta_tours = DB::select($consultaReportesTours);

                return view('inicioAdministracion', compact('listadoProductos', 'listadoHospedajes', 'listadoTiquetes', 'listadoPublicaciones', 'listadoComentarios', 'lista_venta_producto', 'lista_venta_tours', 'listadoPublicacionesIngles', 'listadoUsuarios'));
    		

    	}else{

            $listadoUsuarios = user::all();
                $consultaTiquetes = "select t.id, t.numero, t.precio, h.nombre, t.estado from tiquete t inner join hospedaje h where t.id_hospedaje = h.id";
                $listadoTiquetes = DB::select($consultaTiquetes);
                $listadoProductos = producto::all();
                $listadoHospedajes = hospedaje::all();
                $listadoPublicaciones = publicacion::all();
                $listadoPublicacionesIngles = publicacionIngles::all();
                $listadoComentarios = comentario::all();

                $consultaReportesProductos = "select p.nombre, v.cantidad, v.precio, v.created_at from venta_producto v inner join producto p where p.id = v.id_producto";

                $lista_venta_producto = DB::select($consultaReportesProductos);

                $consultaReportesTours = "select t.numero, v.precio, v.created_at from venta_tour v inner join tiquete t where t.estado = 'Vendido' and t.id = v.id_tiquete";

                $lista_venta_tours = DB::select($consultaReportesTours);

                flash('No es posible registrar un nuevo usuario con campos vacios')->important();
                return view('inicioAdministracion', compact('listadoProductos', 'listadoHospedajes', 'listadoTiquetes', 'listadoPublicaciones', 'listadoComentarios', 'lista_venta_producto', 'lista_venta_tours', 'listadoPublicacionesIngles', 'listadoUsuarios'));

    	}

    }

    public function eliminarUsuario($usuario){

        $usuario = user::find($usuario);
        $usuario->delete();

         $listadoUsuarios = user::all();
                $consultaTiquetes = "select t.id, t.numero, t.precio, h.nombre, t.estado from tiquete t inner join hospedaje h where t.id_hospedaje = h.id";
                $listadoTiquetes = DB::select($consultaTiquetes);
                $listadoProductos = producto::all();
                $listadoHospedajes = hospedaje::all();
                $listadoPublicaciones = publicacion::all();
                $listadoPublicacionesIngles = publicacionIngles::all();
                $listadoComentarios = comentario::all();

                $consultaReportesProductos = "select p.nombre, v.cantidad, v.precio, v.created_at from venta_producto v inner join producto p where p.id = v.id_producto";

                $lista_venta_producto = DB::select($consultaReportesProductos);

                $consultaReportesTours = "select t.numero, v.precio, v.created_at from venta_tour v inner join tiquete t where t.estado = 'Vendido' and t.id = v.id_tiquete";

                $lista_venta_tours = DB::select($consultaReportesTours);

                flash('Usuario eliminado correctamente')->important();
                return view('inicioAdministracion', compact('listadoProductos', 'listadoHospedajes', 'listadoTiquetes', 'listadoPublicaciones', 'listadoComentarios', 'lista_venta_producto', 'lista_venta_tours', 'listadoPublicacionesIngles', 'listadoUsuarios'));
    }
}
