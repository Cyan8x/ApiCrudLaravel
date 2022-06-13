<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;
use Illuminate\Support\Facades\Validator;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas = Marca::all();
        return $marcas;
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
            "marca" => "required|string|unique:marcas"
        ];

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return response([
                "status" => false,
                "msg" => $validator->errors()->all()
            ]);
        }

        $marca = new Marca();
        $marca->marca = $request->marca;

        $marca->save();

        return response([
            "status" => true,
            "msg" => "Marca Creada exitosamente"
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
            "marca" => "required|string|unique:marcas"
        ];

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return response([
                "status" => false,
                "msg" => $validator->errors()->all()
            ]);
        }

        $marca = Marca::findOrFail($request->id);
        $marca->marca = $request->marca;

        $marca->save();

        return response([
            "status" => true,
            "msg" => "Marca Actualizada exitosamente"
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
        $marca = Marca::destroy($request->id);

        return response([
            "status" => true,
            "msg" => "Marca Eliminada exitosamente"
        ]);
    }
}
