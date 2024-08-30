<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AsignamientoCodigos;

class AsignamientoCodigosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = AsignamientoCodigos::all();
        return  response()->json($datos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $asignamiento = new AsignamientoCodigos();
        $asignamiento->fecha_asignamiento = $request->fecha_asignamiento;
        $asignamiento->usuario_id = $request->usuario_id;
        $asignamiento->codigo_id = $request->codigo_id;
        $asignamiento->save();

        return response()->json($asignamiento);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $datos = AsignamientoCodigos::find($id);
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
        $datos = AsignamientoCodigos::find($id);
        if(!$datos){
            return response()->json(["message" => "No se pudo encontrar el registro"], 404);
        }
        $datos->fecha_asignamiento = $request->fecha_asignamiento;
        $datos->usuario_id = $request->usuario_id;
        $datos->codigo_id = $request->codigo_id;
        $datos->save();
        return response()->json($datos);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $datos = AsignamientoCodigos::find($id);
        if(!$datos){
            return response()->json(["message" => "No se pudo encontrar el registro"], 404);
        }
        $datos->delete();
        return response()->json(["message" => "Registro Eliminado con exito"], 404);
    }
}
