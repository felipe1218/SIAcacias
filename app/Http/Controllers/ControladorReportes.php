<?php

namespace lasAcaciasCoffeeFarm\Http\Controllers;

use Illuminate\Http\Request;
use lasAcaciasCoffeeFarm\producto;
use lasAcaciasCoffeeFarm\hospedaje;
use lasAcaciasCoffeeFarm\tiquete;
use lasAcaciasCoffeeFarm\publicacionIngles;
use lasAcaciasCoffeeFarm\publicacion;
use Illuminate\Support\Facades\DB;
use lasAcaciasCoffeeFarm\venta_producto;
use lasAcaciasCoffeeFarm\venta_tour;
use Illuminate\Support\Facades\DB;
use lasAcaciasCoffeeFarm\user;

class ControladorReportes extends Controller
{
    //

     public function reporteVentaProducto($venta_producto)
    {

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

        return  view('inicioAdministracion',compact('lista_venta_tours','lista_venta_producto','listadoProductos', 'listadoHospedajes', 'listadoTiquetes', 'listadoPublicaciones', 'listadoComentarios', 'listadoPublicacionesIngles', 'listadoUsuarios'));
    }
      public function reporteVentaTour($venta_tours)
    {
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
    
        $venta_tours= venta_tours::find($venta_tours);
        
        return  view('inicioAdministracion',compact('lista_venta_tours','lista_venta_producto','listadoProductos', 'listadoHospedajes', 'listadoTiquetes', 'listadoPublicaciones', 'listadoComentarios', 'listadoPublicacionesIngles', 'listadoUsuarios'));
    }
        
}
