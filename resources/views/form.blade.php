<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulário</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <div class="card">
        <div class="card-body center">
            <div class="errors"> 

            <!-- Sessão criada para que caso exista uma mensagem ele mostra -->
            <!-- "sucess" é variável que tem amarzenada a string que nesse caso é uma mensagem de sucesso de cadastro-->
        
                @if(Session::has('success'))
                    <p>{{Session::get('success')}}</p>
                @endif

                @if(Session::has('error'))
                    <p>{{Session::get('error')}}</p>
                @endif
            </div>
            <form action="{{url('/'.(isset($usuario) ? $usuario->id : '') ) }}" method="post">     
                
                @if(isset($usuario)) <!-- Caso exista um usuario ele vai enviar o method put -->
                    @method("PUT")
                @endif

                <!-- token -->
                @csrf
                <label for="nome">Nome</label>
                <input class="form-control" value="{{old('nome',isset($usuario) ? $usuario->nome :'' )}}" type="text" name="nome" id="nome"><br>
                <!-- a linha acima retorna o valor que estava anteriormente
                a linha abaixo retorna a mensagem de erro -->
                {{$errors->first('nome')}} 

                <label for="email">Email</label>
                <input class="form-control" value="{{old('email', isset($usuario) ? $usuario->email :'' )}}" type="text" name="email" id="email"><br>
                {{$errors->first('email')}}


                <label for="data_nascimento">Data de Nascimento</label>
                <input class="form-control" value="{{old('data_nascimento', isset($usuario) ? $usuario->data_nascimento :'' )}}" type="text" name="data_nascimento" id="data_nascimento"><br>
                {{$errors->first('data_nascimento')}}
         
                <label for="nivel_id">Nivel: </label>
                <select class="form-control" name="nivel_id" >
                @foreach($niveis as $nivel)
                <option {{isset($usuario) && $usuario->nivel_id == $nivel->id ? 'selected' : '' }} value="{{$nivel->id}}">{{$nivel->nome}}</option>
                @endforeach
                </select>
                {{$errors->first('nivel_id')}}
  
                <label for="materia[]">Matérias </label>
                <select class="form-control"name="materia[]" multiple>
                    @foreach($materias as $materia)
                        <option value= "{{$materia->id}}">{{$materia->nome}}</option>
                    @endforeach
                </select> 
                <input class="btn btn-primary" type="submit" value="Enviar">

            </form>
        </div>
    </div>
        
    </div>
    
</body>
</html>