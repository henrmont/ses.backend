<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function create(Request $request) {
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ]);

            return response()->json([
                "message" => "Usuário criado com sucesso"
            ]);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Erro no sistema"
            ]);
        }
    }
}
