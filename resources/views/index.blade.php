<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Titulo</title>
</head>
<body>
<table>

    <tr>
        <th>Nome: </th>
        <th>Email: </th>
        <th>Data Nascimento: </th>
        <th>Nivel: </th>
    </tr>

    @foreach($usuarios as $usuario)

        <tr>
            <td>{{$usuario->nome}}</td>
            <td>{{$usuario->email}}</td>
            <td>{{$usuario->data_nascimento}}</td>
            <td>{{$usuario->nivel->nome}}</td>
        </tr>
    @endforeach
    </table>
</body>
</html>