<?php

namespace lasAcaciasCoffeeFarm\Http\Controllers;

use lasAcaciasCoffeeFarm\hospedaje;
use lasAcaciasCoffeeFarm\granja;
use lasAcaciasCoffeeFarm\producto;
use lasAcaciasCoffeeFarm\tiquete;
use lasAcaciasCoffeeFarm\publicacion;
use lasAcaciasCoffeeFarm\publicacionIngles;
use lasAcaciasCoffeeFarm\comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use lasAcaciasCoffeeFarm\user;

class ControladorComentarios extends Controller
{

	public function store(Request $request){
    	
    	$comentario = new comentario();
    	$comentario->nombre_turista = $request->input('nombre_turista');
    	$comentario->texto = $request->input('texto');

    	$comentario->save();

		$listadoPublicaciones = publicacion::all();
        $listadoPublicacionesIngles = publicacionIngles::all();
    	return view('inicioTuristas', compact('listadoPublicaciones'));
    	
	}

    public function eliminarComentario($comentario){

			
		$comentario = comentario::find($comentario);
		$comentario->delete();

         $consultaTiquetes = "select t.id, t.numero, t.precio, h.nombre, t.estado from tiquete t inner join hospedaje h where t.id_hospedaje = h.id";
            $listadoTiquetes = DB::select($consultaTiquetes);
		
		$listadoProductos = producto::all();
        $listadoHospedajes = hospedaje::all();
        $listadoUsuarios = user::all();
        $listadoPublicaciones = publicacion::all();
        $listadoPublicacionesIngles = publicacionIngles::all();
        $listadoComentarios = comentario::all();

        $consultaReportesProductos = "select p.nombre, v.cantidad, v.precio, v.created_at from venta_producto v inner join producto p where p.id = v.id_producto";

        $lista_venta_producto = DB::select($consultaReportesProductos);

        $consultaReportesTours = "select t.numero, v.precio, v.created_at from venta_tour v inner join tiquete t where t.estado = 'Vendido' and t.id = v.id_tiquete";

        $lista_venta_tours = DB::select($consultaReportesTours);

        return view('inicioAdministracion', compact('lista_venta_tours','lista_venta_producto','listadoProductos', 'listadoHospedajes', 'listadoTiquetes', 'listadoPublicaciones', 'listadoComentarios', 'listadoPublicacionesIngles', 'listadoUsuarios'));

	}
}
