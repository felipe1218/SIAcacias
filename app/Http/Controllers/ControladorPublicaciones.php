<?php

namespace lasAcaciasCoffeeFarm\Http\Controllers;

use Illuminate\Http\Request;
use lasAcaciasCoffeeFarm\producto;
use lasAcaciasCoffeeFarm\hospedaje;
use lasAcaciasCoffeeFarm\tiquete;
use lasAcaciasCoffeeFarm\publicacion;
use lasAcaciasCoffeeFarm\comentario;
use Illuminate\Support\Facades\DB;

class ControladorPublicaciones extends Controller
{
     public function store(Request $request){
    	
    	$publicacion = new publicacion();
    	$publicacion->titulo = $request->input('titulo');
    	$publicacion->resumen = $request->input('resumen');
    	$publicacion->texto = $request->input('texto');

    	$publicacion->save();

    	$listadoProductos = producto::all();
    	$listadoHospedajes = hospedaje::all();
    	$listadoTiquetes = tiquete::all();
    	$listadoPublicaciones = publicacion::all();
		$listadoComentarios = comentario::all();

        $consultaReportesProductos = "select p.nombre, v.cantidad, v.precio, v.created_at from venta_producto v inner join producto p where p.id = v.id_producto";

        $lista_venta_producto = DB::select($consultaReportesProductos);

        $consultaReportesTours = "select t.numero, v.precio, v.created_at from venta_tour v inner join tiquete t where t.estado = 'Vendido' and t.id = v.id_tiquete";

        $lista_venta_tours = DB::select($consultaReportesTours);

        return view('inicioAdministracion', compact('listadoProductos', 'listadoHospedajes', 'listadoTiquetes', 'listadoPublicaciones', 'listadoComentarios', 'lista_venta_producto', 'lista_venta_tours'));
    	
	}

	public function editarPublicacion($publicacion){

		$publicacion = publicacion::find($publicacion);
		return view('editarPublicacion', compact('publicacion'));

	}

	public function eliminarPublicacion($publicacion){

			
		$publicacion = publicacion::find($publicacion);
		$publicacion->delete();
		
		$listadoProductos = producto::all();
        $listadoHospedajes = hospedaje::all();
        $listadoTiquetes = tiquete::all();
        $listadoPublicaciones = publicacion::all();
        $listadoComentarios = comentario::all();

        $consultaReportesProductos = "select p.nombre, v.cantidad, v.precio, v.created_at from venta_producto v inner join producto p where p.id = v.id_producto";

        $lista_venta_producto = DB::select($consultaReportesProductos);

        $consultaReportesTours = "select t.numero, v.precio, v.created_at from venta_tour v inner join tiquete t where t.estado = 'Vendido' and t.id = v.id_tiquete";

        $lista_venta_tours = DB::select($consultaReportesTours);

        return view('inicioAdministracion', compact('listadoProductos', 'listadoHospedajes', 'listadoTiquetes', 'listadoPublicaciones', 'listadoComentarios', 'lista_venta_producto', 'lista_venta_tours'));

	}

	public function actualizarPublicacion(Request $request, $id){

		$publicacion = publicacion::find($id);
		$publicacion -> fill($request->all());
		$publicacion -> save();

		$listadoProductos = producto::all();
        $listadoHospedajes = hospedaje::all();
        $listadoTiquetes = tiquete::all();
        $listadoPublicaciones = publicacion::all();
        $listadoComentarios = comentario::all();

        $consultaReportesProductos = "select p.nombre, v.cantidad, v.precio, v.created_at from venta_producto v inner join producto p where p.id = v.id_producto";

        $lista_venta_producto = DB::select($consultaReportesProductos);

        $consultaReportesTours = "select t.numero, v.precio, v.created_at from venta_tour v inner join tiquete t where t.estado = 'Vendido' and t.id = v.id_tiquete";

        $lista_venta_tours = DB::select($consultaReportesTours);
        
        return view('inicioAdministracion', compact('listadoProductos', 'listadoHospedajes', 'listadoTiquetes', 'listadoPublicaciones', 'listadoComentarios', 'lista_venta_producto', 'lista_venta_tours'));
	}
}
