<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TipoUsuario;

class TipoUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = TipoUsuario::all();
        return response()->json($datos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tipo = new TipoUsuario();
        $tipo->nombre = $request->nombre;
        $tipo->descripccion = $request->descripccion;
        $tipo->role_number = $request->role_number;
        $tipo->save();

        return response()->json($tipo);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $datos = TipoUsuario::find($id);
        if(!$datos){
            return response()->json(["message" => "No se encontro el registro"], 404);
        }
        return response()->json($datos);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datos = TipoUsiario::find($id);
        if(!$datos){
            return response()->json(["message" => "No se encontro el registro"], 404);
        }
        $datos->nombre = $request->nombre;
        $datos->descripccion = $request->descripccion;
        $datos->role_number = $request->role_number;
        $datos->save();
        return response()->json($datos);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $datos = TipoUsiario::find($id);
        if(!$datos){
            return response()->json(["message" => "No se encontro el registro"], 404);
        }
        $datos->delete();
        return response()->json(["message" => "Registro Eliminado con Exito"]);
    }
}
