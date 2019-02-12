<?php

namespace lasAcaciasCoffeeFarm\Http\Controllers;

use lasAcaciasCoffeeFarm\publicacion;
use lasAcaciasCoffeeFarm\publicacionIngles;
use Illuminate\Http\Request;

class ControladorTuristas extends Controller
{
    public function cargarPagina(){

    	$listadoPublicaciones = publicacion::all();
    	
    	return view('inicioTuristas', compact('listadoPublicaciones'));

    }

    public function cargarPaginaLenguaje(Request $request){

    	if ($request->input('idioma')==0) {
    		$listadoPublicaciones = publicacion::all();
    		return view('inicioTuristas', compact('listadoPublicaciones'));
    	}
    	if ($request->input('idioma')==1) {
    		$listadoPublicaciones = publicacionIngles::all();
    		return view('inicioTuristas', compact('listadoPublicaciones'));
    	}

    	

    }
}
