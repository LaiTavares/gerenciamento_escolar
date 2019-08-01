<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulário</title>
</head>
<body>
    <form action="{{url('/'.(isset($usuario) ? $usuario->id : '') )}}" method="post">     
        
        @if(isset($usuario))
            @method("PUT")
        @endif


        <!-- token -->
        @csrf

         

        <label for="nome">Nome</label>
        <input value="{{isset($usuario) ? $usuario->nome :'' }}" type="text" name="nome" id="nome">

        <br>
        <br>

        <label for="email">Email</label>
        <input value="{{isset($usuario) ? $usuario->email :'' }}" type="text" name="email" id="email">

        <br>       
        <br>

        <label for="data_nascimento">Data de Nascimento</label>
        <input value="{{isset($usuario) ? $usuario->data_nascimento :'' }}" type="text" name="data_nascimento" id="data_nascimento">

        <br>       
        <br>   

        <label for="nivel_id">Nivel: </label>
        <select name="nivel_id" >
        @foreach($niveis as $nivel)
        <option {{isset($usuario) && $usuario->nivel_id == $nivel->id ? 'selected' : '' }} value="{{$nivel->id}}">{{$nivel->nome}}</option>
        @endforeach
        </select>

        <br>
        <br>  

        <input type="submit" value="Enviar">

    </form>
</body>
</html>