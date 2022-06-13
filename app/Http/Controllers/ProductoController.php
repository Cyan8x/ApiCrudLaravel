<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();

        return $productos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            "cod_marca" => "required|integer",
            "cod_categ" => "required|integer",
            "cod_prov" => "required|integer",
            "cod_orig_prod" => "required|string|unique:productos",
            "nombre" => "required|string",
            "stock" => "required|integer",
            "precio" => "required"
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response([
                "status" => false,
                "msg" => $validator->errors()->all()
            ]);
        }

        $producto = new Producto();
        $producto->cod_marca = $request->cod_marca;
        $producto->cod_categ = $request->cod_categ;
        $producto->cod_prov = $request->cod_prov;
        $producto->cod_orig_prod = $request->cod_orig_prod;
        $producto->nombre = $request->nombre;
        $producto->stock = $request->stock;
        $producto->precio = $request->precio;

        $producto->save();

        return response([
            "status" => true,
            "msg" => "Producto Creado exitosamente"
        ]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules = [
            "cod_marca" => "required|integer",
            "cod_categ" => "required|integer",
            "cod_prov" => "required|integer",
            "cod_orig_prod" => "required|string|unique:productos",
            "nombre" => "required|string",
            "stock" => "required|integer",
            "precio" => "required"
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response([
                "status" => false,
                "msg" => $validator->errors()->all()
            ]);
        }

        $producto = Producto::findOrFail($request->id);
        $producto->cod_marca = $request->cod_marca;
        $producto->cod_categ = $request->cod_categ;
        $producto->cod_prov = $request->cod_prov;
        $producto->cod_orig_prod = $request->cod_orig_prod;
        $producto->nombre = $request->nombre;
        $producto->stock = $request->stock;
        $producto->precio = $request->precio;

        $producto->save();

        return response([
            "status" => true,
            "msg" => "Producto Actualizado exitosamente"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $producto = Producto::destroy($request->id);

        return response([
            "status" => true,
            "msg" => "Producto Eliminado exitosamente"
        ]);
    }
}
