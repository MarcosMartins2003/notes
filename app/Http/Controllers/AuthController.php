<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Container\Attributes\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }
    public function loginSubmit(Request $request){


        $request -> validate(
            [
                'text_username' => 'required|email',
                'text_password' => 'required|min:6|max:16'
            ],
            [
                'text_username.requiered' => 'O username é obrigatorio',
                'text_username.email' => 'E-mail invalido',
                'text_password.required' => 'A senha é obrigatoria',
                'text_password.min' => 'A senha deve ter :min ou mais caracteres',
                'text_password.max' => 'A senha deve ter no maximo de :max caracteres'
                
            ]
        );

        $usename = $request -> input('text_username');
        $password =  $request -> input('text_password');

        $user = User::where("username", $usename)
                    ->first();
        
        if(!$user){
            return redirect()
            ->back()
            ->withInput()
            ->with('loginError', 'username ou password incorreto');
        }

        if(!password_verify($password, $user->password)){
            return redirect()
            ->back()
            ->withInput()
            ->with('loginError', 'username ou password incorreto');
        }

        $user->last_login = date('Y-m-d H:i:s');
        $user->save();


        session([
            'user' => [
                'id' => $user->id,
             'username' => $user->username
            ]
            ]);

            echo 'Login efetuado com sucesso';
 


    }

    public function logout(){
        echo 'logout';
    }
}
