<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visita - {{ $visit->id }}</title>
</head>
<body>
    <h1>Detalhes da Visita {{ $visit->id }}</h1>
    
    <table border="1">
        <tr>
            <th>Id</th>
            <td>{{ $visit->id }}</td>
        </tr>
        <tr>
            <th>Data</th>
            <td>{{ $visit->date }}</td>
        </tr>
        <tr>
            <th>Horário</th>
            <td>{{ $visit->time }}</td>
        </tr>
        <tr>
            <th>Endereço</th>
            <td>{{ $visit->address }}</td>
        </tr>
        <tr>
            <th>Descrição</th>
            <td>{{ $visit->description }}</td>
        </tr>
        <tr>
            <th>Tipo</th>
            <td>{{ $visit->type }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $visit->status }}</td>
    </table>

    <br>
    <a href="{{ route('visits.index') }}">Voltar</a>
    <a href="{{ route('visits.edit', $visit->id) }}">Editar</a>
</body>
</html>