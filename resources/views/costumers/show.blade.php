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
            <th>Tipo</th>
            <td>{{ $costumer->type }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $costumer->status }}</td>
        </tr>
    </table>

    <br>
    <h2>Contratos deste Cliente</h2>
    
    @if($costumer->contractsList->isEmpty())
        <p>Nenhum contrato vinculado a este cliente.</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Data Início</th>
                    <th>Data Fim</th>
                    <th>Valor</th>
                    <th>Tipo</th>
                    <th>Status</th>
                    <th>Papel no Contrato</th>
                </tr>
            </thead>
            <tbody>
                @foreach($costumer->contractsList as $contract)
                    <tr>
                        <td>{{ $contract->id }}</td>
                        <td>{{ $contract->title }}</td>
                        <td>{{ \Carbon\Carbon::parse($contract->start_date)->format('d/m/Y') }}</td>
                        <td>{{ $contract->end_date ? \Carbon\Carbon::parse($contract->end_date)->format('d/m/Y') : 'Indeterminado' }}</td>
                        <td>R$ {{ number_format($contract->value, 2, ',', '.') }}</td>
                        <td>{{ $contract->type }}</td>
                        <td>{{ $contract->status }}</td>
                        <td>{{ $contract->pivot->role ?? 'Não especificado' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <br>
    <a href="{{ route('costumers.index') }}">Voltar</a>
    <a href="{{ route('costumers.edit', $costumer->id) }}">Editar</a>
</body>
</html>