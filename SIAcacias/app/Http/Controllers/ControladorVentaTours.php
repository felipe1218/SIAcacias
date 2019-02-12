<?php

namespace lasAcaciasCoffeeFarm\Http\Controllers;

use Illuminate\Http\Request;
use lasAcaciasCoffeeFarm\hospedaje;
use lasAcaciasCoffeeFarm\tiquete;
use lasAcaciasCoffeeFarm\producto;
use lasAcaciasCoffeeFarm\publicacion;
use lasAcaciasCoffeeFarm\comentario;
use lasAcaciasCoffeeFarm\venta_tour;
use lasAcaciasCoffeeFarm\tour;
use lasAcaciasCoffeeFarm\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use lasAcaciasCoffeeFarm\user;

class ControladorVentaTours extends Controller
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($tiquete)
    {
        //
        $tiquete= tiquete::find($tiquete);
        return  view('inicioAdministracion',compact('listaTiquete'));
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
   public function filtrarTiquetes(Request $request){

        
        $id = $request->input('hospedaje');

        
        $consultaTiquetes = "select t.numero, t.precio, t.id from tiquete t where t.id_hospedaje = $id and t.estado = 'No vendido'";
        
        $listadoTiquetes = DB::select($consultaTiquetes);

        $tiquete = new tiquete();
        
        $listadoHospedajes = hospedaje::all();

        $hospedaje = new hospedaje();

        $listadoProductos = producto::all();


    return view('inicioVentas',compact('listadoProductos', 'listadoHospedajes', 'listadoTiquetes', 'tiquete', 'hospedaje'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function venderTiquetes(Request $request){

        if (!(is_null($request->input('tiquetesSeleccionados')))) {
            
            $tiquetesSeleccionados = $request->input('tiquetesSeleccionados');
        $precioTotal = '0';

        foreach ($tiquetesSeleccionados as $tiquete => $valueP) {

            $tiqueteS = tiquete::find($valueP);

            $tour = new tour();
            $tour->id_granja='1';
            $tour->precio = '1';
            $tour->id_tipo_tour = '1';
            $tour->save();


            $ventaTour = new venta_tour();
            $ventaTour->id_tour = '1';
            $ventaTour->id_tiquete = $tiqueteS->id;
            $ventaTour->cantidad = '1';
            $ventaTour->precio = $tiqueteS->precio;
            $ventaTour->save();

            $tiqueteS->estado = 'Vendido';
            $tiqueteS->save();

            $precioTotal = $precioTotal + $tiqueteS->precio;

        }
        $listadoHospedajes = hospedaje::all();
        //$listadoTiquetes = tiquete::all();
        $consultaTiquetes = "select t.numero, t.precio, t.id from tiquete t where t.estado = 'No vendido'";
        
        $listadoTiquetes = DB::select($consultaTiquetes);

        $listadoProductos = producto::all();
        
        flash('Venta registrada correctamente, el valor es: $' .$precioTotal)->important();
        return view('inicioVentas', compact('listadoTiquetes', 'listadoHospedajes', 'listadoProductos'));
        }else{

             $listadoHospedajes = hospedaje::all();
            //$listadoTiquetes = tiquete::all();
            $consultaTiquetes = "select t.numero, t.precio, t.id from tiquete t where t.estado = 'No vendido'";
            
            $listadoTiquetes = DB::select($consultaTiquetes);

            $listadoProductos = producto::all();
            
            flash('Es necesario seleccionar al menos un tiquete para realizar la venta')->important();
            return view('inicioVentas', compact('listadoTiquetes', 'listadoHospedajes', 'listadoProductos'));

        }

        

    }
}
