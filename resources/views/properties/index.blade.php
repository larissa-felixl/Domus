<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imóveis</title>
</head>
<body>
    <h1>Todos os imóveis</h1>
    <a href="<?php echo e(route('properties.create')); ?>">Adicionar novo imóvel</a>
    @if($properties->isEmpty())
        <p>Nenhum imóvel cadastrado</p>
    @else
        <thead>
            <tr>
                <th>ID</th>
                <Th>Endereço</Th>
                <th>Preço</th>
                <th>Status</th>
                <th>Dono</th>
            </tr>
        </thead>
        <tbody>
            @foreach($properties as $property)
                <tr>
                    <td>{{ $property->id }}</td>
                    <td>{{ $property->address }}</td>
                    <td>{{ $property->price }}</td>
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
    @endif
    
</body>
</html>