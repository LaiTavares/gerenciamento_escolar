<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <form method="post" action="{{url('/nivel/'.(isset($nivel) ? $nivel->id : '') )  }}">

        @if(isset($nivel))
            @method("PUT")
        @endif

        

        @csrf
        <label for="">Nome do Nível: </label>
        <input value="{{isset($nivel) ? $nivel->nome : '' }}" type="text" name="nome">        
        <br>{{$errors->first("nome")}}
        <input type="submit" value="enviar">
    </form>

</body>
</html>