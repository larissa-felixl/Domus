<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
</head>
<body>
    <h1>Todos os clientes</h1>
    <a href="{{ route('costumers.create') }}">Adicionar novo cliente</a>
    
    @if($costumers->isEmpty())
        <p>Nenhum cliente cadastrado</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Contratos</th>
                    <th>Tipo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($costumers as $costumer)
                    <tr>
                        <td>{{ $costumer->id }}</td>
                        <td>{{ $costumer->name }}</td>
                        <td>{{ $costumer->email }}</td>
                        <td>{{ $costumer->phone }}</td>
                        <td>{{ $costumer->contracts }}</td>
                        <td>{{ $costumer->type }}</td>
                        <td>
                            <a href="{{ route('costumers.show', $costumer->id) }}">Ver</a>
                            <a href="{{ route('costumers.edit', $costumer->id) }}">Editar</a>
                            <form action="{{ route('costumers.destroy', $costumer->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Tem certeza que deseja deletar este cliente?')">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif    
</body>
</html>