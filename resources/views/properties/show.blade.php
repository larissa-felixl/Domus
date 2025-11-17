<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Propriedade {{ $property->id }}</title>
</head>
<body>
    <h1>Detalhes da Propriedade</h1>
    
    <table border="1">
        <tr>
            <th>Id</th>
            <td>{{ $property->id }}</td>
        </tr>
        <tr>
            <th>Endereço</th>
            <td>{{ $property->adress }}</td>
        </tr>
        <tr>
            <th>Tipo</th>
            <td>{{ $property->type }}</td>
        </tr>
        <tr>
            <th>Preço</th>
            <td>{{ $property->price }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $property->status }}</td>
        </tr>
        <tr>
            <th>Nome do proprietário</th>
            <td>{{ $property->owner_name }}</td>
        </tr>
    </table>

    <br>
    <a href="{{ route('properties.index') }}">Voltar</a>
    <a href="{{ route('properties.edit', $property->id) }}">Editar</a>
</body>
</html>