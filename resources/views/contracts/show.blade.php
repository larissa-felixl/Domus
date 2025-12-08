<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contrato - {{ $contract->title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])</head>
</head>
<body class="bg-gray-100 h-full flex flex-col">
    <header class="p-6 shadow-md flex justify-between items-center" style="background-color: #98A6A1;"><div><img src="{{ asset('images/domus.png') }}" alt="logo" class="h-15 w-40"></div><nav>
            <ul class="flex gap-4 p-2 rounded px-3 mr-7" >
                <a href="{{ route('dashboard') }}" class="text-gray-100 hover:text-gray-300 transition">Dashboard</a>
                <a href="{{ route('visits.index') }}" class="text-gray-100 hover:text-gray-300 transition">Agenda</a>
                <a href="{{ route('categories.index') }}" class="text-gray-100 hover:text-gray-300 transition">Categorias</a>
                <a href="{{ route('properties.index') }}" class="text-gray-100 hover:text-gray-300 transition">Propriedades</a>
                <a href="{{ route('costumers.index') }}" class="text-gray-100 hover:text-gray-300 transition">Clientes</a>
                <a href="{{ route('contracts.index') }}" class="text-gray-100 hover:text-gray-300 transition">Contratos</a>
            </ul>
        </nav>
    </header>
    <div class="flex-1">
    <div class="m-7 rounded-lg py-3 shadow-sm" style="background-color: #E5E7E9;">
        <h1 class="m-5 font-bold text-lg text-gray-700">Detalhes do contrato {{ $contract->title }}</h1>
    </div>
    
    <div class="m-7 grid grid-cols-2 gap-6">
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="space-y-4">
                <div class="border-b pb-3">
                    <span class="text-md font-semibold text-gray-700">Id</span>
                    <p class="text-gray-800 mt-1">{{ $contract->id }}</p>
                </div>
                
                <div class="border-b pb-3">
                    <span class="text-md font-semibold text-gray-700">Título</span>
                    <p class="text-gray-800 mt-1">{{ $contract->title }}</p>
                </div>
                
                <div class="border-b pb-3">
                    <span class="text-md font-semibold text-gray-700">Arquivo</span>
                    <a href="{{ asset('storage/' . $contract->file) }}" target="_blank" class="text-gray-600 hover:text-gray-800 underline transition inline-flex items-center gap-1 mt-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Baixar
                    </a>
                </div>
                
                <div class="border-b pb-3">
                    <span class="text-md font-semibold text-gray-700">Data de Início</span>
                    <p class="text-gray-800 mt-1">{{ \Carbon\Carbon::parse($contract->start_date)->format('d/m/Y') }}</p>
                </div>
                
                <div class="border-b pb-3">
                    <span class="text-md font-semibold text-gray-700">Data de fim</span>
                    <p class="text-gray-800 mt-1">{{ $contract->end_date ? \Carbon\Carbon::parse($contract->end_date)->format('d/m/Y') : 'Indeterminado' }}</p>
                </div>
                
                <div class="border-b pb-3">
                    <span class="text-md font-semibold text-gray-700">Tipo de contrato</span>
                    <p class="text-gray-800 mt-1">{{ $contract->type }}</p>
                </div>
                
                <div class="border-b pb-3">
                    <span class="text-md font-semibold text-gray-700">Status</span>
                    <p class="mt-1">
                        <span class="px-2 py-1 text-xs font-medium rounded-md {{ $contract->status === 'Ativo' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                            {{ $contract->status }}
                        </span>
                    </p>
                </div>
                
                <div class="border-b pb-3">
                    <span class="text-sm font-semibold text-gray-500">Valor</span>
                    <p class="text-gray-800 font-medium mt-1">R$ {{ number_format($contract->value, 2, ',', '.') }}</p>
                </div>
                
                <div class="pb-3">
                    <span class="text-sm font-semibold text-gray-500">Descrição</span>
                    <p class="text-gray-800 mt-1">{{ $contract->description }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-6 flex items-center justify-center" style="min-height: 600px;">
            @php
                $fileExtension = pathinfo($contract->file, PATHINFO_EXTENSION);
            @endphp
            
            @if(in_array(strtolower($fileExtension), ['pdf']))
                <iframe src="{{ asset('storage/' . $contract->file) }}" class="w-full h-full rounded border" style="min-height: 600px;"></iframe>
            @elseif(in_array(strtolower($fileExtension), ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                <img src="{{ asset('storage/' . $contract->file) }}" alt="Pré-visualização" class="max-w-full h-auto rounded shadow">
            @else
                <div class="text-center">
                    <svg class="w-24 h-24 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <p class="text-gray-500 mb-4">Pré-visualização não disponível para este tipo de arquivo</p>
                    <a href="{{ asset('storage/' . $contract->file) }}" target="_blank" class="text-gray-600 hover:text-gray-800 underline transition inline-flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Baixar arquivo
                    </a>
                </div>
            @endif
        </div>
    </div>

    <div class="m-7 rounded-lg py-3 shadow-sm" style="background-color: #E5E7E9;">
        <h2 class="m-5 font-bold text-xl text-gray-700">Clientes Vinculados a este Contrato</h2>
    </div>
    
    @if($contract->costumers->isEmpty())
        <div class="m-7">
            <p class="text-gray-500 italic text-center py-8">Nenhum cliente vinculado a este contrato.</p>
        </div>
    @else
        <div class="m-7 bg-white rounded-lg shadow-sm overflow-hidden">
            <table class="w-full">
                <thead>
                    <tr class="border-b" style="background-color: #E5E7E9;">
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">ID</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Nome</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Email</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Telefone</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Papel no Contrato</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($contract->costumers as $costumer)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $costumer->id }}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-800">{{ $costumer->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $costumer->email }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $costumer->phone }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $costumer->pivot->role ?? 'Não especificado' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <div class="m-7 flex gap-3">
        <a href="{{ route('contracts.edit', $contract->id) }}" class="px-6 py-2 rounded-lg font-medium text-white transition hover:opacity-90" style="background-color: #98A6A1;">
            Editar Contrato
        </a>
        <a href="{{ route('contracts.index') }}" class="px-6 py-2 rounded-lg font-medium text-gray-700 transition hover:bg-gray-100" style="background-color: #E5E7E9;">
            Voltar
        </a>
    </div>
    </div>
    <footer class="p-6 shadow-md flex justify-end items-center" style="background-color: #98A6A1;">
        <p class="text-gray-100">&copy; 2025 Domus Imobiliária. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
