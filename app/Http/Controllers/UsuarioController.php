<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nivel;
use App\Usuario;
use App\Http\Requests\UsuarioStoreRequest;

class UsuarioController extends Controller
{
    public function index(){
        $usuarios = Usuario::all();
        $usuariosDeletados = Usuario::onlyTrashed()->get();

        return view('index', compact('usuarios','usuariosDeletados'));

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

    public function store(UsuarioStoreRequest $request){
        $usuario= Usuario::create([
            "nome"=>$request->nome, 
            "email"=>$request->email, 
            "data_nascimento"=>$request->data_nascimento,
            "nivel_id"=>$request->nivel_id
        ]);

        return redirect("/");
    }

    public function edit($id){
        $usuario = Usuario::findOrFail($id);
        $niveis = Nivel::all();
        return view("form", compact("usuario", "niveis"));
    }

    //UsuarioStoreRequest é a classe responsável por fazer as validações e retornar mensagens de erro. 
    // na função abaixo a classe é passada como parâmetro, e executa os metodos que contém na classe. 
    public function update(UsuarioStoreRequest $request, $id){ 
        //$dados = $request->all();
        $usuario = Usuario::findOrFail($id);
        //$usuario->update($dados);

        $usuario->update([
            'nome' => $request->nome,
            'email' => $request->email,
            'data_nascimento' => $request->data_nascimento,
            'nivel_id' => $request->nivel_id
        ]);
        return redirect('/');
    }

    public function destroy($id){
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return back();
    }
    public function restore($id){
        $usuario = Usuario::onlyTrashed()->findOrFail($id);
        $usuario->restore();

        return back();
    }


}

