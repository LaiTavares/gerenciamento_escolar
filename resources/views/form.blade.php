<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulário</title>
</head>
<body>
    <form action="{{url('/'.(isset($usuario) ? $usuario->id : '') ) }}" method="post">     
        
        @if(isset($usuario)) <!-- Caso exista um usuario ele vai enviar o method put -->
            @method("PUT")
        @endif

        <!-- token -->
        @csrf
        <label for="nome">Nome</label>
        <input value="{{old('nome',isset($usuario) ? $usuario->nome :'' )}}" type="text" name="nome" id="nome"><br>
        <!-- a linha acima retorna o valor que estava anteriormente
        a linha abaixo retorna a mensagem de erro -->
        {{$errors->first('nome')}} 
        <br>
        <br>

        <label for="email">Email</label>
        <input value="{{old('email', isset($usuario) ? $usuario->email :'' )}}" type="text" name="email" id="email"><br>
        {{$errors->first('email')}}
        <br>       
        <br>

        <label for="data_nascimento">Data de Nascimento</label>
        <input value="{{old('data_nascimento', isset($usuario) ? $usuario->data_nascimento :'' )}}" type="text" name="data_nascimento" id="data_nascimento"><br>
        {{$errors->first('data_nascimento')}}
        <br>       <br>   
        

        <label for="nivel_id">Nivel: </label>
        <select name="nivel_id" >
        @foreach($niveis as $nivel)
        <option {{isset($usuario) && $usuario->nivel_id == $nivel->id ? 'selected' : '' }} value="{{$nivel->id}}">{{$nivel->nome}}</option>
        @endforeach
        </select><br>
        {{$errors->first('nivel_id')}}
        

        
        <br>  

        <input type="submit" value="Enviar">

    </form>
</body>
</html>