<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

//Classe para sistema de cadastro de usuário
class AuthController extends Controller
{
    public function register(Request $request){
        //Validação dos campos de criação do usuário
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);

        //Transferindo valores do request para os fields e criando usuário
        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
        ]);

        //Criação de token
        $token = $user->createToken($request->nameToken)->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        //Troca de nome no github para aparecer minhas contribuições
        //Retorno de usuário + token para o cliente
        return response($response, 201);
    }
}
