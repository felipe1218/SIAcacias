<?php

namespace lasAcaciasCoffeeFarm\Http\Controllers;

use lasAcaciasCoffeeFarm\publicacion;
use Illuminate\Http\Request;

class ControladorTuristas extends Controller
{
    public function cargarPagina(){

    	$listadoPublicaciones = publicacion::all();
    	return view('inicioTuristas', compact('listadoPublicaciones'));

    }
}
