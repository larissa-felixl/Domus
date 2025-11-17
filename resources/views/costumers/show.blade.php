<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente - {{ $costumer->name }}</title>
</head>
<body>
    <h1>Detalhes do Cliente</h1>
    
    <table border="1">
        <tr>
            <th>Id</th>
            <td>{{ $costumer->id }}</td>
        </tr>
        <tr>
            <th>Nome</th>
            <td>{{ $costumer->name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $costumer->email }}</td>
        </tr>
        <tr>
            <th>Telefone</th>
            <td>{{ $costumer->phone }}</td>
        </tr>
        <tr>
            <th>Contratos</th>
            <td>{{ $costumer->contracts }}</td>
        </tr>
        <tr>
            <th>Tipo</th>
            <td>{{ $costumer->type }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $costumer->status }}</td>
    </table>

    <br>
    <a href="{{ route('costumers.index') }}">Voltar</a>
    <a href="{{ route('costumers.edit', $costumer->id) }}">Editar</a>
</body>
</html>