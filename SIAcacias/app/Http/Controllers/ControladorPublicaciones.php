<?php

namespace lasAcaciasCoffeeFarm\Http\Controllers;

use Illuminate\Http\Request;
use lasAcaciasCoffeeFarm\producto;
use lasAcaciasCoffeeFarm\hospedaje;
use lasAcaciasCoffeeFarm\tiquete;
use lasAcaciasCoffeeFarm\publicacion;
use lasAcaciasCoffeeFarm\publicacionIngles;
use lasAcaciasCoffeeFarm\comentario;
use Illuminate\Support\Facades\DB;
use lasAcaciasCoffeeFarm\user;

class ControladorPublicaciones extends Controller
{
     public function store(Request $request){
    	
    	if (!((is_null($request->input('titulo')))||(is_null($request->input('resumen')))||(is_null($request->input('texto'))))) {
            
            if ($request->input('idioma') == 1) {

                $publicacion = new publicacion();
                $publicacion->titulo = $request->input('titulo');
                $publicacion->resumen = $request->input('resumen');
                $publicacion->texto = $request->input('texto');

                $publicacion->save();

                }elseif ($request->input('idioma') == 2) {

                    $publicacion = new publicacionIngles();
                    $publicacion->titulo = $request->input('titulo');
                    $publicacion->resumen = $request->input('resumen');
                    $publicacion->texto = $request->input('texto');

                    $publicacion->save();
                }
               

                $consultaTiquetes = "select t.id, t.numero, t.precio, h.nombre, t.estado from tiquete t inner join hospedaje h where t.id_hospedaje = h.id";
                $listadoTiquetes = DB::select($consultaTiquetes);
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

                return view('inicioAdministracion', compact('listadoProductos', 'listadoHospedajes', 'listadoTiquetes', 'listadoPublicaciones', 'listadoComentarios', 'lista_venta_producto', 'lista_venta_tours', 'listadoPublicacionesIngles', 'listadoUsuarios'));

        }else{

            $consultaTiquetes = "select t.id, t.numero, t.precio, h.nombre, t.estado from tiquete t inner join hospedaje h where t.id_hospedaje = h.id";
            $listadoTiquetes = DB::select($consultaTiquetes);
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

            flash('No es posible registrar una publicacion con los campos vacios')->important();
            return view('inicioAdministracion', compact('listadoProductos', 'listadoHospedajes', 'listadoTiquetes', 'listadoPublicaciones', 'listadoComentarios', 'lista_venta_producto', 'lista_venta_tours', 'listadoPublicacionesIngles', 'listadoUsuarios'));

        }
        
    	
	}

	public function editarPublicacion($publicacion){

		$publicacion = publicacion::find($publicacion);
		return view('editarPublicacion', compact('publicacion'));

	}

	public function eliminarPublicacion($publicacion){

			
		$publicacion = publicacion::find($publicacion);
		$publicacion->delete();
		
		$consultaTiquetes = "select t.id, t.numero, t.precio, h.nombre, t.estado from tiquete t inner join hospedaje h where t.id_hospedaje = h.id";
        $listadoTiquetes = DB::select($consultaTiquetes);
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

        return view('inicioAdministracion', compact('listadoProductos', 'listadoHospedajes', 'listadoTiquetes', 'listadoPublicaciones', 'listadoComentarios', 'lista_venta_producto', 'lista_venta_tours', 'listadoPublicacionesIngles', 'listadoUsuarios'));

	}

    public function eliminarPublicacionIngles($publicacion){

            
        $publicacion = publicacionIngles::find($publicacion);
        $publicacion->delete();
        
        $consultaTiquetes = "select t.id, t.numero, t.precio, h.nombre, t.estado from tiquete t inner join hospedaje h where t.id_hospedaje = h.id";
        $listadoTiquetes = DB::select($consultaTiquetes);
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

        return view('inicioAdministracion', compact('listadoProductos', 'listadoHospedajes', 'listadoTiquetes', 'listadoPublicaciones', 'listadoComentarios', 'lista_venta_producto', 'lista_venta_tours', 'listadoPublicacionesIngles', 'listadoUsuarios'));

    }

	public function actualizarPublicacion(Request $request, $id){

        if (!((is_null($request->input('resumen')))||(is_null($request->input('texto'))))) {

            $publicacion = publicacion::find($id);
            $publicacion -> fill($request->all());
            $publicacion -> save();

            $consultaTiquetes = "select t.id, t.numero, t.precio, h.nombre, t.estado from tiquete t inner join hospedaje h where t.id_hospedaje = h.id";
            $listadoTiquetes = DB::select($consultaTiquetes);
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
            return view('inicioAdministracion', compact('listadoProductos', 'listadoHospedajes', 'listadoTiquetes', 'listadoPublicaciones', 'listadoComentarios', 'lista_venta_producto', 'lista_venta_tours', 'listadoPublicacionesIngles', 'listadoUsuarios'));
            
        }else{

            $consultaTiquetes = "select t.id, t.numero, t.precio, h.nombre, t.estado from tiquete t inner join hospedaje h where t.id_hospedaje = h.id";
            $listadoTiquetes = DB::select($consultaTiquetes);
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
             flash('No es posible editar una publicacion con los campos vacios')->important();
            return view('inicioAdministracion', compact('listadoProductos', 'listadoHospedajes', 'listadoTiquetes', 'listadoPublicaciones', 'listadoComentarios', 'lista_venta_producto', 'lista_venta_tours', 'listadoPublicacionesIngles', 'listadoUsuarios'));

        }

    }
}
