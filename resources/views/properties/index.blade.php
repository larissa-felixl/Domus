<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imóveis</title>
</head>
<body>
    <h1>Todos os imóveis</h1>
    <a href="{{ route('properties.create') }}">Adicionar novo imóvel</a>
    
    @if($properties->isEmpty())
        <p>Nenhum imóvel cadastrado</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Endereço</th>
                    <th>Preço</th>
                    <th>Tipo</th>
                    <th>Status</th>
                    <th>Dono</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($properties as $property)
                    <tr>
                        <td>{{ $property->id }}</td>
                        <td>{{ $property->adress }}</td>
                        <td>{{ $property->price }}</td>
                        <td>{{ $property->type }}</td>
                        <td>{{ $property->status }}</td>
                        <td>{{ $property->owner_name }}</td>
                        <td>
                            <a href="{{ route('properties.show', $property->id) }}">Ver</a>
                            <a href="{{ route('properties.edit', $property->id) }}">Editar</a>
                            <form action="{{ route('properties.destroy', $property->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Tem certeza que deseja deletar este imóvel?')">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    
</body>
</html>