<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente - {{ $costumer->name }}</title>
     @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 h-full flex flex-col">
    <header class="p-6 shadow-md flex justify-between items-center" style="background-color: #98A6A1;"><div><img src="{{ asset('images/domus.png') }}" alt="logo" class="h-15 w-40"></div><nav>
            <ul class="flex gap-4 p-2 rounded px-3 mr-7">
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
        <h1 class="m-5 font-bold text-lg text-gray-700">Detalhes do(a) cliente {{ $costumer->name }}</h1>
    </div>
    
    <div class="m-7 bg-white rounded-lg shadow-sm overflow-hidden" style="border-color: #D5D8DC;">
        <!-- Barra verde no topo -->
        <div class="h-16 flex items-center px-6" style="background-color: #98A6A1;">
            <h2 class="text-xl font-bold text-white">{{ $costumer->name }}</h2>
        </div>
        
        <!-- Conteúdo -->
        <div class="p-6">
            <div class="grid grid-cols-3 gap-6">
                <div class="col-span-2 space-y-4">
                <div>
                    <span class="font-semibold text-2xl text-gray-600">Email:</span>
                    <p class="text-gray-800">{{ $costumer->email }}</p>
                </div>
                <div>
                    <span class="font-semibold text-2xl text-gray-600">Telefone:</span>
                    <p class="text-gray-800">{{ $costumer->phone }}</p>
                </div>
                <div>
                    <span class="font-semibold text-2xl text-gray-600">Tipo:</span>
                    <p class="text-gray-800">{{ $costumer->type }}</p>
                </div>
                <div>
                    <span class="font-semibold text-2xl text-gray-600">Status:</span>
                    <p class="text-gray-800">{{ $costumer->status }}</p>
                </div>
                <div>
                    <span class="font-semibold text-2xl text-gray-600">Contratos vinculados:</span>
                    <p class="text-gray-800">{{ $costumer->contractsList->count() }}</p>
                </div>
            </div>
            <div class="flex items-center justify-center">
                @if($costumer->picture)
                    <img src="{{ asset('storage/' . $costumer->picture) }}" alt="{{ $costumer->name }}" class="w-50 h-50 object-cover rounded-lg shadow-md">
                @else
                    <div class="w-50 h-50 bg-gray-300 rounded-lg flex items-center justify-center">
                        <span class="text-gray-500 text-sm">Sem foto</span>
                    </div>
                @endif
            </div>
        </div>
        </div>
    </div>
    
    <div class="m-7 flex gap-3">
        <a href="{{ route('costumers.edit', $costumer->id) }}" class="px-6 py-2 rounded-lg font-medium text-white transition hover:opacity-90" style="background-color: #98A6A1;">
            Editar Cliente
        </a>
        <a href="{{ route('costumers.index') }}" class="px-6 py-2 rounded-lg font-medium text-gray-700 transition hover:bg-gray-100" style="background-color: #E5E7E9;">
            Voltar
        </a>
    </div>
    </div>
    <footer class="p-6 shadow-md flex justify-end items-center" style="background-color: #98A6A1;">
        <p class="text-gray-100">&copy; 2025 Domus Imobiliária. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
