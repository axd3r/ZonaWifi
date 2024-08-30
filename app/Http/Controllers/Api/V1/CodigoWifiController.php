<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CodigoWifi;

class CodigoWifiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = CodigoWifi::all();
        return response()->json($datos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $codigos = new CodigoWifi();
        $codigos->codigo = $request->codigo;
        $codigos->estado = $request->estado;
        $codigos->fecha_creacion = $request->fecha_creacion;
        $codigos->valor = $request->valor;
        $codigos->save();

        return response()->json($codigos);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $datos = CodigoWifi::find($id);
        if(!$datos){
            return response()->json(["message" => "No se pudo encontrar el registro"], 404);
        }
        return response()->json($datos);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datos = CodigoWifi::find($id);
        if(!$datos){
            return response()->json(["message" => "No se pudo encontrar el registro"], 404);
        }
        $datos->codigo = $request->codigo;
        $datos->estado = $request->estado;
        $datos->fecha_creacion = $request->fecha_creacion;
        $datos->valor = $request->valor;
        $datos->save();

        return response()->json($datos);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $datos = CodigoWifi::find($id);
        if(!$datos){
            return response()->json(["message" => "No se pudo encontrar el registro"], 404);
        }
        $datos->delete();

        return response()->json(["message" => "Registro Eliminado Correctamente"]);
    }
}
