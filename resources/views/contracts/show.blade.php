<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contrato - {{ $contract->title }}</title>
</head>
<body>
    <h1>Detalhes do contrato {{ $contract->title }}</h1>
    
    <table border="1">
        <tr>
            <th>Id</th>
            <td>{{ $contract->id }}</td>
        </tr>
        <tr>
            <th>Titulo</th>
            <td>{{ $contract->title }}</td>
        </tr>
        <tr>
            <th>Arquivo</th>
            <td>
                <a href="{{ asset('storage/' . $contract->file) }}" target="_blank" style="color: blue; text-decoration: underline;">
                                📄 Baixar
                </a>
            </td>
        </tr>
        <tr>
            <th>Data de Início</th>
            <td>{{ $contract->start_date }}</td>
        </tr>
        <tr>
            <th>Data de fim</th>
            <td>{{ $contract->end_date }}</td>
        </tr>
        <tr>
            <th>Tipo de contrato</th>
            <td>{{ $contract->type }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $contract->status }}</td>
        <tr>
            <th>Valor</th>
            <td>R$ {{ number_format($contract->value, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Valor</th>
            <td>R$ {{ number_format($contract->value, 2, ',', '.') }}</td>
        </tr>
           
    </table>

    <br>
    <h2>Clientes Vinculados a este Contrato</h2>
    
    @if($contract->costumers->isEmpty())
        <p>Nenhum cliente vinculado a este contrato.</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Papel no Contrato</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contract->costumers as $costumer)
                    <tr>
                        <td>{{ $costumer->id }}</td>
                        <td>{{ $costumer->name }}</td>
                        <td>{{ $costumer->email }}</td>
                        <td>{{ $costumer->phone }}</td>
                        <td>{{ $costumer->pivot->role ?? 'Não especificado' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <br>
    <a href="{{ route('contracts.index') }}">Voltar</a>
    <a href="{{ route('contracts.edit', $contract->id) }}">Editar</a>
</body>
</html>