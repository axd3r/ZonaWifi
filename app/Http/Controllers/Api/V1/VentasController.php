<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ventas;

class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = Ventas::all();
        return response()->json($datos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ventas = new Ventas();
        $ventas->asignacion_id = $request->asignacion_id;
        $ventas->fecha_venta = $request->fecha_venta;
        $ventas->cantidad = $request->cantidad;
        $ventas->save();

        return response()->json($ventas);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $datos = Ventas::find($id);
        if(!$datos){
            return response()->json(["message" => "No se pudo enocntrar el registro"]);
        }
        return response($datos);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datos = Ventas::find($id);
        if(!$datos){
            return response()->json(["message" => "No se pudo enocntrar el registro"]);
        }
        $datos->asignacion_id = $request->asignacion_id;
        $datos->fecha_venta = $request->fecha_venta;
        $datos->cantidad = $request->cantidad;
        $datos->save();

        return response($datos);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $datos = Ventas::find($id);
        if(!$datos){
            return response()->json(["message" => "No se pudo enocntrar el registro"]);
        }
        $datos->delete();

        return response()->json(["message" => "Registro Eliminado con Exito"]);
    }
}
