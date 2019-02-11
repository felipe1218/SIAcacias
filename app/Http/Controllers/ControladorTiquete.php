<?php

namespace lasAcaciasCoffeeFarm\Http\Controllers;

use Illuminate\Http\Request;
use lasAcaciasCoffeeFarm\hospedaje;
use lasAcaciasCoffeeFarm\tiquete;
use lasAcaciasCoffeeFarm\producto;
use lasAcaciasCoffeeFarm\publicacion;
use lasAcaciasCoffeeFarm\publicacionIngles;
use lasAcaciasCoffeeFarm\comentario;
use lasAcaciasCoffeeFarm\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ControladorTiquete extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inicioTiquete');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $contadorNumeroTiquete = $request->input('numeroInferior');

        if ($request->input('numeroInferior') < $request->input('numeroSuperior')) {

            while ($contadorNumeroTiquete <= $request->input('numeroSuperior')) {
                
                $tiquete = new tiquete();
                $tiquete->numero = $contadorNumeroTiquete;
                $tiquete->precio = $request->input('precio');
                $tiquete->estado = 'No vendido';
                $tiquete->id_hospedaje = $request->input('hospedaje');

                $tiquete->save();

                $contadorNumeroTiquete = $contadorNumeroTiquete + 1;

            }

            $listadoTiquetes = tiquete::all();
            $listadoProductos = producto::all();
            $listadoHospedajes = hospedaje::all();
            $listadoPublicaciones = publicacion::all();
            $listadoPublicacionesIngles = publicacionIngles::all();
            $listadoComentarios = comentario::all();

            $consultaReportesProductos = "select p.nombre, v.cantidad, v.precio, v.created_at from venta_producto v inner join producto p where p.id = v.id_producto";

            $lista_venta_producto = DB::select($consultaReportesProductos);

            $consultaReportesTours = "select t.numero, v.precio, v.created_at from venta_tour v inner join tiquete t where t.estado = 'Vendido' and t.id = v.id_tiquete";

            $lista_venta_tours = DB::select($consultaReportesTours);


            return view('inicioAdministracion', compact('listadoProductos', 'listadoHospedajes', 'listadoTiquetes', 'listadoPublicaciones', 'listadoComentarios', 'lista_venta_producto', 'lista_venta_tours', 'listadoPublicacionesIngles'));

            
        }else{

            $listadoTiquetes = tiquete::all();
            $listadoProductos = producto::all();
            $listadoHospedajes = hospedaje::all();
            $listadoPublicaciones = publicacion::all();
            $listadoPublicacionesIngles = publicacionIngles::all();
            $listadoComentarios = comentario::all();

            $consultaReportesProductos = "select p.nombre, v.cantidad, v.precio, v.created_at from venta_producto v inner join producto p where p.id = v.id_producto";

            $lista_venta_producto = DB::select($consultaReportesProductos);

            $consultaReportesTours = "select t.numero, v.precio, v.created_at from venta_tour v inner join tiquete t where t.estado = 'Vendido' and t.id = v.id_tiquete";

            $lista_venta_tours = DB::select($consultaReportesTours);


            flash('El número inferior debe ser menor al número superior')->important();
             return view('inicioAdministracion', compact('listadoProductos', 'listadoHospedajes', 'listadoTiquetes', 'listadoPublicaciones', 'listadoComentarios', 'lista_venta_producto', 'lista_venta_tours', 'listadoPublicacionesIngles'));
        }

        }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editarTiquete($tiquete){

        $tiquete = tiquete::find($tiquete);
        return view('editarTiquete', compact('tiquete'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function actualizarTiquete(Request $request, $id){

        $tiquete = tiquete::find($id);
        $tiquete -> fill($request->all());
        $tiquete -> save();

        $listadoTiquetes = tiquete::all();
        $listadoProductos = producto::all();
        $listadoHospedajes = hospedaje::all();
        $listadoPublicaciones = publicacion::all();
        $listadoPublicacionesIngles = publicacionIngles::all();
        $listadoComentarios = comentario::all();

        $consultaReportesProductos = "select p.nombre, v.cantidad, v.precio, v.created_at from venta_producto v inner join producto p where p.id = v.id_producto";

        $lista_venta_producto = DB::select($consultaReportesProductos);

        $consultaReportesTours = "select t.numero, v.precio, v.created_at from venta_tour v inner join tiquete t where t.estado = 'Vendido' and t.id = v.id_tiquete";

        $lista_venta_tours = DB::select($consultaReportesTours);


        return view('inicioAdministracion', compact('listadoProductos', 'listadoHospedajes', 'listadoTiquetes', 'listadoPublicaciones', 'listadoComentarios', 'lista_venta_producto', 'lista_venta_tours', 'listadoPublicacionesIngles'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminarTiquete($tiquete){

            
        $tiquete = tiquete::find($tiquete);
        $tiquete->delete();

        $listadoTiquetes = tiquete::all();
        $listadoProductos = producto::all();
        $listadoHospedajes = hospedaje::all();
        $listadoPublicaciones = publicacion::all();
        $listadoPublicacionesIngles = publicacionIngles::all();
        $listadoComentarios = comentario::all();

        $consultaReportesProductos = "select p.nombre, v.cantidad, v.precio, v.created_at from venta_producto v inner join producto p where p.id = v.id_producto";

        $lista_venta_producto = DB::select($consultaReportesProductos);

        $consultaReportesTours = "select t.numero, v.precio, v.created_at from venta_tour v inner join tiquete t where t.estado = 'Vendido' and t.id = v.id_tiquete";

        $lista_venta_tours = DB::select($consultaReportesTours);


        return view('inicioAdministracion', compact('listadoProductos', 'listadoHospedajes', 'listadoTiquetes', 'listadoPublicaciones', 'listadoComentarios', 'lista_venta_producto', 'lista_venta_tours', 'listadoPublicacionesIngles'));

    }
}
