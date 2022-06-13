<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;
use Illuminate\Support\Facades\Validator;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = Proveedor::all();

        return $proveedores;
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
            "proveedor" => "required|string|unique:proveedores"
        ];

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return response([
                "status" => false,
                "msg" => $validator->errors()->all()
            ]);
        }

        $proveedor = new Proveedor();
        $proveedor->proveedor = $request->proveedor;

        $proveedor->save();

        return response([
            "status" => true,
            "msg" => "Proveedor Añadido exitosamente"
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
            "proveedor" => "required|string|unique:proveedores"
        ];

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return response([
                "status" => false,
                "msg" => $validator->errors()->all()
            ]);
        }

        $proveedor = Proveedor::findOrFail($request->id);
        $proveedor->proveedor = $request->proveedor;

        $proveedor->save();

        return response([
            "status" => true,
            "msg" => "Proveedor Actualizado exitosamente"
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
        $proveedor = Proveedor::destroy($request->id);

        return response([
            "status" => true,
            "msg" => "Proveedor Eliminado exitosamente"
        ]);
    }
}
