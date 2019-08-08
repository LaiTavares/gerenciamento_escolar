<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Titulo</title>
</head>
<body>
<h2>Usuarios ativos</h2>
<div class="errors">
                @if(Session::has('success'))
                    <p>{{Session::get('success')}}</p>
                @endif

                @if(Session::has('error'))
                    <p>{{Session::get('error')}}</p>
                @endif
            </div>
<table border=1>
    <tr>
        <th>Nome: </th>
        <th>Email: </th>
        <th>Data Nascimento: </th>
        <th>Nivel: </th>
        <th>Editar</th>
        <th>Deletar</th>

    </tr>

    @foreach($usuarios as $usuario)
        <tr>
            <td>{{$usuario->nome}}</td>
            <td>{{$usuario->email}}</td>
            <td>{{$usuario->data_nascimento}}</td>
            <td>{{$usuario->nivel->nome}}</td>
            <th><button><a href="{{url('/'.$usuario->id.'/edit') }}">Editar </a> </button> </th>
            <td>
                <form method="POST" action="{{url($usuario->id)}}">
                    @method('delete')
                    @csrf
                    <button type="submit">Deletar</button>
                </form>
            </td>
        </tr>
    @endforeach
    </table>
    <button> <a href="{{url('/form')}} "> Novo Cadastro </a></button>
    <h2>Usuarios deletados</h2>
    <table border=1>
    <tr>
        <th>Nome: </th>
        <th>Email: </th>
        <th>Data Nascimento: </th>
        <th>Nivel: </th>
        <th>Editar</th>
        <th>Deletar</th>
    </tr>
    @foreach($usuariosDeletados as $usuario)
        <tr>
            <td>{{$usuario->nome}}</td>
            <td>{{$usuario->email}}</td>
            <td>{{$usuario->data_nascimento}}</td>
            <td>{{$usuario->nivel->nome}}</td>
            <th><button><a href="{{url('/'.$usuario->id.'/edit') }}">Editar </a> </button> </th>
            <td>
                <form method="POST" action="{{url('/restore/'.$usuario->id)}}">
                    @method('put')
                    @csrf
                    <button type="submit">Des-deletar</button>
                </form>
            </td>
        </tr>
    @endforeach
    </table>

</body>
</html>