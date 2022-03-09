<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;

class ArticuloController extends Controller
{


    public function __construct(){

        $this->middleware('auth');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // obtenemos los paramenos de la tabla de la base de datos 
       $articulos=Articulo::all();
        return view('articulo.index')->with('articulos_index',$articulos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articulo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $articulos_store = new Articulo();

        // obtenemos la imformacion del formulario por medio de 'name' form
        $articulos_store->codigo = $request->get('Codigo');
        $articulos_store->descripcion = $request->get('Descripcion');
        $articulos_store->cantidad = $request->get('Cantidad');
        $articulos_store->precio = $request->get('Precio');

        // guardamos todo en la tabla 
        $articulos_store->save();

        return redirect('/articulos');
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
    public function edit($id)
    {
        $articulo_edit=Articulo::find($id);
        return view('articulo.edit')->with('articulo_Edit',$articulo_edit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $articulos_update = Articulo::find($id);

        // obtenemos la imformacion del formulario por medio de 'name' form
        $articulos_update->codigo = $request->get('Codigo');
        $articulos_update->descripcion = $request->get('Descripcion');
        $articulos_update->cantidad = $request->get('Cantidad');
        $articulos_update->precio = $request->get('Precio');

        // guardamos todo en la tabla 
        $articulos_update->save();

        return redirect('/articulos');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articulo_edit=Articulo::find($id);
        $articulo_edit->delete();
        return redirect('/articulos');
    }
}
