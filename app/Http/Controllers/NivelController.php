<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nivel;
use App\Http\Requests\NivelStoreRequest;
class NivelController extends Controller
{
    public function index(){
        $niveis = Nivel::all();
        return view('indexNivel', compact("niveis"));

    }

    public function create(){        
        return view('formNivel');
    }

   
    public function store(NivelStoreRequest $request){
        $nivel = $request->all();
        Nivel::create($nivel);
        return redirect("/nivel");
    }

    public function edit($id){
        $nivel = Nivel::findOrFail($id);
        return view("formNivel", compact("nivel"));
    }

    public function update(NivelStoreRequest $request, $id){
        //$dados = $request->all();
        $nivel = Nivel::findOrFail($id);
        //$usuario->update($dados);

        $nivel->update([
            'nome' => $request->nome
        ]);
        return redirect('/nivel');

    }



}
