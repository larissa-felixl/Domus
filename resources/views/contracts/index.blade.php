<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contratos</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])</head>
<body class="bg-gray-100 h-full flex flex-col">
    <!--criar um filtro por data-->
    <header class="p-6 shadow-md flex justify-end items-center" style="background-color: #98A6A1;">
        <nav>
            <ul class="flex gap-4 p-2 rounded px-3 mr-7" >
                <a href="{{ route('dashboard') }}" class="text-gray-100 hover:text-gray-300 transition">Dashboard</a>
                <a href="{{ route('visits.index') }}" class="text-gray-100 hover:text-gray-300 transition">Agenda</a>
                <a href="{{ route('properties.index') }}" class="text-gray-100 hover:text-gray-300 transition">Propriedades</a>
                <a href="{{ route('costumers.index') }}" class="text-gray-100 hover:text-gray-300 transition">Clientes</a>
                <a href="{{ route('contracts.index') }}" class="text-gray-100 hover:text-gray-300 transition">Contratos</a>
                <a href="{{ route('profile.edit') }}" class="text-gray-100 hover:text-gray-300 transition">Perfil</a>
            </ul>
        </nav>
    </header>
    <div class="flex-1">
    <div class="m-7 rounded-lg py-3 shadow-sm" style="background-color: #E5E7E9;">
        <h1 class="m-5 font-bold text-xl text-gray-700">Contratos</h1>
        <a href="{{ route('contracts.create') }}" class="m-5 hover:underline transition text-gray-700">Adicionar novo contrato</a>
    </div>
    <div class="m-7">
        @if ($contracts->isEmpty())
            <p class="text-gray-500 italic text-center py-8">Nenhum contrato cadastrado.</p>
        @else
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <table class="w-full">
                    <thead>
                        <tr class="border-b" style="background-color: #E5E7E9;">
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">ID</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Título</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Arquivo</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Início</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Fim</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Valor</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Tipo</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Status</th>
                            <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($contracts as $contract)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $contract->id }}</td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-800">{{ $contract->title }}</td>
                                <td class="px-6 py-4 text-sm">
                                    <a href="{{ asset('storage/' . $contract->file) }}" target="_blank" class="text-gray-600 hover:text-gray-800 underline transition inline-flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        Baixar
                                    </a>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ \Carbon\Carbon::parse($contract->start_date)->format('d/m/Y') }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $contract->end_date ? \Carbon\Carbon::parse($contract->end_date)->format('d/m/Y') : 'Indeterminado' }}</td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-700">R$ {{ number_format($contract->value, 2, ',', '.') }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $contract->type }}</td>
                                <td class="px-6 py-4 text-sm">
                                    <span class="px-2 py-1 text-xs font-medium rounded-lg {{ $contract->status === 'Ativo' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                        {{ $contract->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-center">
                                    <div class="flex items-center justify-center gap-3">
                                        <a href="{{ route('contracts.show', $contract->id) }}" class="text-gray-600 hover:text-gray-800 transition font-medium">Ver</a>
                                        <a href="{{ route('contracts.edit', $contract->id) }}" class="text-gray-600 hover:text-gray-800 transition font-medium">Editar</a>
                                        <form action="{{ route('contracts.destroy', $contract->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Tem certeza que deseja deletar esse contrato?')" class="text-red-600 hover:text-red-800 transition font-medium">
                                                Deletar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach 
                    </tbody>
                </table>
            </div>
        @endif
    </div>
    </div>
    <footer class="p-6 shadow-md flex justify-end items-center" style="background-color: #98A6A1;">
        <p class="text-gray-100">&copy; 2025 Domus Imobiliária. Todos os direitos reservados.</p>
    </footer>
</body>
</html>