<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        echo 'ok';
    }

    public function logout(){
        echo 'logout';
    }
}
