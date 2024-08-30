<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TipoUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email','password');
            if(Auth::attempt($credentials)){
                $user = Auth::user();
                $token = $user->createToken('MyApp')->plainTextToken;
                $name = $user->name;
                $id_user = $user->id;
                $tipo_usuario_id = $user->tipo_usuario_id;

                return response()->json([
                    'token' => $token,
                    'name' => $name,
                    'id_user' => $id_user,
                    'tipo_usuario' => $tipo_usuario_id
                ]);
            }else{
                return response()->json(["message" => "Credenciales Invalidas"], 401);
            }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tipo_usuario_id' => $request->tipo_usuario_id
        ]);
        return response()->json([
            "message" => "Usuario creado exitosamente",
            "user" => $user
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function authToken(Request $request)
    {
        $token = $request->header("Authorization");
        $user = Auth::user();
        $tableName = $user->getTable();
        $rol = $user->tipoUsuario->role_number;
        $user->tipoUsuario = $rol;
        $user->token = $token;
        $user->table = $tableName;
        return $user;
    }


    /**
     * Update the specified resource in storage.
     */
}
