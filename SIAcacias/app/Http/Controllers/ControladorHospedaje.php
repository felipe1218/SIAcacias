<?php

namespace lasAcaciasCoffeeFarm\Http\Controllers;

use Illuminate\Http\Request;
use lasAcaciasCoffeeFarm\hospedaje;
use lasAcaciasCoffeeFarm\granja;
use lasAcaciasCoffeeFarm\producto;
use lasAcaciasCoffeeFarm\tiquete;
use lasAcaciasCoffeeFarm\publicacion;
use lasAcaciasCoffeeFarm\publicacionIngles;
use lasAcaciasCoffeeFarm\comentario;
use Illuminate\Support\Facades\DB;
use lasAcaciasCoffeeFarm\user;

use lasAcaciasCoffeeFarm\Http\Controllers\Controller;

class ControladorHospedaje extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $listaHospedaje=Hospedaje::all();
        return view('inicioAdministracion',compact('listaHospedaje'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('inicioAdministracion');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $hospedajesRegistrados = hospedaje::all();

        foreach ($hospedajesRegistrados as $hospedajeARegistrar) { 
            
            if ( !( ($hospedajeARegistrar->nombre == $request->input('nombre')) || (is_null($request->input('nombre'))))) {

                $hospedaje = new hospedaje();
                $hospedaje->nombre = $request->input('nombre');
                $hospedaje->id_granja = '1';
                $hospedaje->save();

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

                return view('inicioAdministracion', compact('listadoProductos', 'listadoHospedajes', 'listadoTiquetes', 'listadoPublicaciones', 'listadoComentarios', 'lista_venta_producto', 'lista_venta_tours', 'listadoPublicacionesIngles', 'listadoUsuarios'));
               
            }else{


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

                flash('No es posible registrar un hospedaje con el campo nombre vacío, o con un nombre registrado anteriormente')->important();
                return view('inicioAdministracion', compact('listadoProductos', 'listadoHospedajes', 'listadoTiquetes', 'listadoPublicaciones', 'listadoComentarios', 'lista_venta_producto', 'lista_venta_tours', 'listadoPublicacionesIngles', 'listadoUsuarios'));
            }

        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($hospedaje)
    {
        //
        $hospedaje= hospedaje::find($hospedaje);
        return  view('inicioAdministracion',compact('listaHospedaje'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editarHospedaje($hospedaje)
    {
        //
        $hospedaje= hospedaje::find($hospedaje);
        return view('editarHospedaje',compact('hospedaje'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualiarHospedaje(Request $request, $id)
    {
        
       $hospedajesRegistrados = hospedaje::all();

        foreach ($hospedajesRegistrados as $hospedajeARegistrar) { 
            
            if ( !( ($hospedajeARegistrar->nombre == $request->input('nombre')) || (is_null($request->input('nombre'))))) {

                $hospedaje = hospedaje::find($id);
                $hospedaje -> fill($request->all());
                $hospedaje -> save();

                $consultaTiquetes = "select t.id, t.numero, t.precio, h.nombre, t.estado from tiquete t inner join hospedaje h where t.id_hospedaje = h.id";
                $listadoTiquetes = DB::select($consultaTiquetes);
                $listadoUsuarios = user::all();
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

                flash('No es posible editar un hospedaje con el campo nombre vacío, o con un nombre registrado anteriormente')->important();

                return view('inicioAdministracion', compact('listadoProductos', 'listadoHospedajes', 'listadoTiquetes', 'listadoPublicaciones', 'listadoComentarios', 'lista_venta_producto', 'lista_venta_tours', 'listadoPublicacionesIngles', 'listadoUsuarios'));

        }
 
    }
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminarHospedaje($hospedaje)
    {
        $hospedaje=hospedaje::find($hospedaje);
        $hospedaje->delete();

        
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
}
