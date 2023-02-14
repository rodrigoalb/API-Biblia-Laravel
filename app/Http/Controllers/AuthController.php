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

        //Retorno de usuário + token para o cliente
        return response($response, 201);
    }

    public function login(Request $request){

        //Validando se os campos foram preenchidos
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $fields['email'])->first();

        //Verificação se o e-mail existe ou se a senha está correta
        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response([
                'message' => 'E-mail ou senha inválidos'
            ], 401);
        }

        $token = $user->createToken('UsuarioLogado')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request){

        auth()->user()->tokens()->delete();

        return response([
            'message' => 'Deslogado com sucesso'
        ], 200);
    }
}
