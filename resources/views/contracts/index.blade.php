<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contratos</title>
</head>
<body>
    <!--criar um filtro por data-->
    <h1>Contratos</h1>
    <a href="{{ route('contracts.create') }}">Adicionar novo contrato</a>
    @if ($contracts->isEmpty())
        <p>Nenhum contrato cadastrado.</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Título</th>
                    <th>Arquivo</th>
                    <th>Data de Início</th>
                    <th>Data de Fim</th>
                    <th>Valor</th>
                    <th>Tipo</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contracts as $contract)
                    <tr>
                        <td>{{ $contract->id }}</td>
                        <td>{{ $contract->title }}</td>
                        <td>
                            <a href="{{ asset('storage/' . $contract->file) }}" target="_blank" style="color: blue; text-decoration: underline;">
                                📄 Baixar
                            </a>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($contract->start_date)->format('d/m/Y') }}</td>
                        <td>{{ $contract->end_date ? \Carbon\Carbon::parse($contract->end_date)->format('d/m/Y') : 'Indeterminado' }}</td>
                        <td>R$ {{ number_format($contract->value, 2, ',', '.') }}</td>
                        <td>{{ $contract->type }}</td>
                        <td>{{ $contract->status }}</td>
                        <td>
                            <a href="{{ route('contracts.show', $contract->id) }}">Ver</a>
                            <a href="{{ route('contracts.edit', $contract->id) }}">Editar</a>
                            <form action="{{ route('contracts.destroy', $contract->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Tem certeza que deseja deletar esse contrato?')">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach 
            </tbody>
        </table>
    @endif
</body>
</html>