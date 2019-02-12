<?php

namespace lasAcaciasCoffeeFarm\Http\Controllers;

use Illuminate\Http\Request;
use lasAcaciasCoffeeFarm\producto;
use lasAcaciasCoffeeFarm\hospedaje;
use lasAcaciasCoffeeFarm\tiquete;
use Illuminate\Support\Facades\DB;
use lasAcaciasCoffeeFarm\publicacion;
use lasAcaciasCoffeeFarm\publicacionIngles;
use lasAcaciasCoffeeFarm\comentario;
use lasAcaciasCoffeeFarm\venta_producto;
use lasAcaciasCoffeeFarm\venta_tours;
use lasAcaciasCoffeeFarm\user;

class ControladorProductos extends Controller
{
    /**
    *Método para registrar o crear productos, se recibe como parámetro la petición enviada por *POST desde la vista y se crea el producto con los atributos
    */
    public function store(Request $request){

        if (!(is_null($request->input('nombre')) || is_null($request->input('precio')))) {

            $producto = new producto();
            $producto->nombre = $request->input('nombre');
            $producto->precio = $request->input('precio');
            $producto->cantidad = '0';
            $producto->id_granja = '1';
            $producto->id_tipo_producto = $request->input('tipo_producto');

            $producto->save();

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

            flash('Producto registrado correctamente')->important();

            return view('inicioAdministracion', compact('lista_venta_tours','lista_venta_producto','listadoProductos', 'listadoHospedajes', 'listadoTiquetes', 'listadoPublicaciones', 'listadoComentarios', 'listadoPublicacionesIngles', 'listadoUsuarios'));
        
            
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

            flash('No deben existir campos vacios')->important();

            return view('inicioAdministracion', compact('lista_venta_tours','lista_venta_producto','listadoProductos', 'listadoHospedajes', 'listadoTiquetes', 'listadoPublicaciones', 'listadoComentarios', 'listadoPublicacionesIngles', 'listadoUsuarios'));

        }
    	
	}

	public function editarProducto($producto){

		$producto = producto::find($producto);
		return view('editarProducto', compact('producto'));

	}

	public function eliminarProducto($producto){

			
		$producto = producto::find($producto);
		$producto->delete();
		
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

        flash('Producto elimnado correctamente')->important();
        return view('inicioAdministracion', compact('lista_venta_tours','lista_venta_producto','listadoProductos', 'listadoHospedajes', 'listadoTiquetes', 'listadoPublicaciones', 'listadoComentarios', 'listadoPublicacionesIngles', 'listadoUsuarios'));

	}

	public function actualizarProducto(Request $request, $id){

		if (! (is_null($request->input('precio')) || is_null($request->input('cantidad')) )){
            
            $producto = producto::find($id);
            $producto -> fill($request->all());
            $producto -> save();

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

            flash('Producto editado correctamente')->important();
            return view('inicioAdministracion', compact('lista_venta_tours','lista_venta_producto','listadoProductos', 'listadoHospedajes', 'listadoTiquetes', 'listadoPublicaciones', 'listadoComentarios', 'listadoPublicacionesIngles', 'listadoUsuarios'));
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

            flash('No es posible editar el producto con campos vacios')->important();
            return view('inicioAdministracion', compact('lista_venta_tours','lista_venta_producto','listadoProductos', 'listadoHospedajes', 'listadoTiquetes', 'listadoPublicaciones', 'listadoComentarios', 'listadoPublicacionesIngles', 'listadoUsuarios'));

        }

        
	}

    public function venderProductos(Request $request){

        if (!((is_null($request->input('productosSeleccionados')))||(is_null($request->input('cantidadVendida'))))) {
            

            $productosSeleccionados = $request->input('productosSeleccionados');
        $cantidadVendida = $request->input('cantidadVendida');
        $precioTotal = '0';

        $listadoCantidades=array();

        $contadorCantidades = '0';

        $contadorCantidadesParaVenta = '0';

        foreach ($cantidadVendida as $cantidadV => $valueC) {

            if ($valueC > '0') {

                $listadoCantidades[$contadorCantidades] = $valueC;
                $contadorCantidades++;
            }

        }  

        foreach ($productosSeleccionados as $producto => $valueP) {

            $valueCa = $listadoCantidades[$contadorCantidadesParaVenta];
            $contadorCantidadesParaVenta++;

            $productoS = producto::find($valueP);
            $unidadesRestantes = $productoS->cantidad - $valueCa;
            $precio_venta = $productoS->precio * $valueCa;
            $productoS->cantidad = $unidadesRestantes;
            $productoS -> save();

            $venta = new venta_producto();
            $venta->id_producto = $productoS->id;
            $venta->cantidad = $valueCa;
            $venta->precio = $precio_venta;
            $venta->save();

            $precioTotal = $precioTotal + $precio_venta;

        }          
                
               
    
        //$producto = producto::find( $request->input('producto'));

        $consultaTiquetes = "select t.numero, t.precio, t.id from tiquete t where t.estado = 'No vendido'";
        
        $listadoTiquetes = DB::select($consultaTiquetes);

        $listadoProductos = producto::all();

        $listadoHospedajes = hospedaje::all();

        flash('Venta registrada correctamente, el valor es: $' .$precioTotal)->important();
        return view('inicioVentas', compact('listadoProductos', 'listadoTiquetes', 'listadoHospedajes'));

    }else{
        $consultaTiquetes = "select t.numero, t.precio, t.id from tiquete t where t.estado = 'No vendido'";
        
        $listadoTiquetes = DB::select($consultaTiquetes);

        $listadoProductos = producto::all();

        $listadoHospedajes = hospedaje::all();

        flash('Es necesario seleccionar un producto y una cantidad para realizar la venta')->important();
        return view('inicioVentas', compact('listadoProductos', 'listadoTiquetes', 'listadoHospedajes'));
        }
    }

        
}
