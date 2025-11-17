<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de visitas</title>
</head>
<body>
    <!--criar um filtro por data-->
    <h1>Visitas Agendadas</h1>
    <a href="{{ route('visits.create') }}">Adicionar nova visita à agenda</a>
    @if ($visits->isEmpty())
        <p>Nenhuma visita agendada.</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Data</th>
                    <th>Hora</th>
                    <th>Endereço</th>
                    <th>Descrição</th>
                    <th>Tipo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($visits as $visit)
                    <tr>
                        <td>{{ $visit->id }}</td>
                        <td>{{ $visit->date }}</td>
                        <td>{{ $visit->time }}</td>
                        <td>{{ $visit->address }}</td>
                        <td>{{ $visit->description }}</td>
                        <td>{{ $visit->type }}</td>
                    </tr>
                @endforeach 
            </tbody>
        </table>
    @endif
</body>
</html>