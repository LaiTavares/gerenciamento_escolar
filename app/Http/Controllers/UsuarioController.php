<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nivel;
use App\Usuario;

class UsuarioController extends Controller
{
    public function index(){
        $usuarios = Usuario::all();
        return view('index', compact("usuarios"));

    }

    public function create(){
        $niveis = Nivel::all();
        return view('form',compact('niveis'));
    }

    //public function soma($a, $b){
    //    return "Soma=".($a + $b);
    //}

    //public function store(Request $request){
    //    return $request->all();
    //}

    public function store(Request $request){
        $usuario= Usuario::create([
            "nome"=>$request->nome, 
            "email"=>$request->email, 
            "data_nascimento"=>$request->data_nascimento,
            "nivel_id"=>$request->nivel_id
        ]);

        return redirect("/");
    }
}

