<?php

namespace App\Http\Controllers;

//importando classe

use Illuminate\Http\Request;
use App\Nivel;
use App\Usuario;
use App\Materia;
use DB;
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
        $materias = Materia::all();        
        return view('form',compact('niveis', 'materias'));
    }

    //public function soma($a, $b){
    //    return "Soma=".($a + $b);
    //}

    //public function store(Request $request){
    //    return $request->all();
    //}

    public function store(UsuarioStoreRequest $request){

        //Metodo que inicia a transação com o banco de dados - 
        //Serve para garantir que as informações só serão salvas no banco caso dê tudo certo até o DB::Commit.
        DB::beginTransaction();
        try{    
            $usuario = Usuario::create($request->all());
            $usuario->materias()->sync($request->materias); //sync é como um salvar, mas através de um relacionamento
            //Recebe array, e relaciona cada id de materia ao id de usuário


            /* A lógica abaixo é chamada de pivot que é usando quando eu quero passar um parâmetro junto 
            junto com as matérias - É preciso usar java script para buscar essas opções na view.
            $usuario = materias()->sync({
                1 => ['carga_horaria' => 20],
                2 => ['carga_horaria' => 10] 
            });
            
            */ 
            
            DB::commit();
            //Linha abaixo redireciona para "/" e envia a mensagem abaixo. 
            //"success" é uma variável de array, que nesse caso amarzena a mensagem.
            //Depois essa mensagem é chamado na view - 
            return redirect("/")->with('success' , 'Tudo certin, usuario cadastrado mano!');
        }catch(\Exception $e){

            DB::rollback();
            return back()->with('error' , 'Ta errado bro!');
        }

       //As linhas abaixo cadastra no banco nome, email, data_nascimento e nivel_id 
        //$usuario= Usuario::create([
        //    "nome"=>$request->nome, 
        //    "email"=>$request->email, 
        //    "data_nascimento"=>$request->data_nascimento,
        //    "nivel_id"=>$request->nivel_id
        //]);        
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

