<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{

    public function index(){

        echo 'Dentro da aplicação';
    }

    public function newNote(){
        echo 'criado nova nota';
    }

}
