<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Propriedade - {{ $property->adress }}</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-100 h-full flex flex-col">
    <header class="p-6 shadow-md flex justify-end items-center" style="background-color: #98A6A1;">
        <nav>
            <ul class="flex gap-4 p-2 rounded px-3 mr-7">
                <a href="{{ route('dashboard') }}" class="text-gray-100 hover:text-gray-300 transition">Dashboard</a>
                <a href="{{ route('visits.index') }}" class="text-gray-100 hover:text-gray-300 transition">Agenda</a>
                <a href="{{ route('categories.index') }}" class="text-gray-100 hover:text-gray-300 transition">Categorias</a>
                <a href="{{ route('properties.index') }}" class="text-gray-100 hover:text-gray-300 transition">Propriedades</a>
                <a href="{{ route('costumers.index') }}" class="text-gray-100 hover:text-gray-300 transition">Clientes</a>
                <a href="{{ route('contracts.index') }}" class="text-gray-100 hover:text-gray-300 transition">Contratos</a>
                <a href="{{ route('profile.edit') }}" class="text-gray-100 hover:text-gray-300 transition">Perfil</a>
            </ul>
        </nav>
    </header>
    <div class="flex-1">
    <div class="m-7 rounded-lg py-3 shadow-sm" style="background-color: #E5E7E9;">
        <h1 class="m-5 font-bold text-xl text-gray-700">Detalhes da Propriedade</h1>
    </div>
    
    <div class="mx-auto max-w-5xl px-7 mb-7">
        <div class="bg-white rounded-lg shadow-sm overflow-hidden border" style="border-color: #D5D8DC;">
            <!-- Barra verde no topo -->
            <div class="h-16 flex items-center px-6" style="background-color: #98A6A1;">
                <h2 class="text-xl font-bold text-white">{{ $property->adress }}</h2>
            </div>
            
            <!-- Conteúdo -->
            <div class="p-8">
                <div class="flex gap-8">
                    <!-- Informações da propriedade -->
                    <div class="flex-1 space-y-3">
                        <div class="flex gap-2">
                            <span class="text-sm font-medium text-gray-500">Preço:</span>
                            <span class="text-gray-800 font-medium">R$ {{ number_format($property->price, 2, ',', '.') }}</span>
                        </div>
                        <div class="flex gap-2">
                            <span class="text-sm font-medium text-gray-500">Tipo:</span>
                            <span class="text-gray-800 font-medium">{{ $property->type }}</span>
                        </div>
                        <div class="flex gap-2">
                            <span class="text-sm font-medium text-gray-500">Status:</span>
                            <span class="text-gray-800 font-medium">{{ $property->status }}</span>
                        </div>
                        <div class="flex gap-2">
                            <span class="text-sm font-medium text-gray-500">Categoria:</span>
                            <span class="text-gray-800 font-medium">{{ $property->category ? $property->category->name : 'Sem categoria' }}</span>
                        </div>
                        @if($property->owner_name)
                            <div class="flex gap-2">
                                <span class="text-sm font-medium text-gray-500">Proprietário:</span>
                                <span class="text-gray-800 font-medium">{{ $property->owner_name }}</span>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Foto da propriedade -->
                    <div class="flex flex-col items-center gap-3">
                        @if($property->picture)
                            <img src="{{ asset('storage/' . $property->picture) }}" alt="{{ $property->adress }}" class="w-80 h-80 object-cover rounded-lg shadow-md border-2" style="border-color: #D5D8DC;">
                        @else
                            <div class="w-80 h-80 bg-gray-200 rounded-lg flex items-center justify-center">
                                <span class="text-gray-400 text-sm">Sem foto</span>
                            </div>
                        @endif
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
    <div class="m-7 flex gap-3">
        <a href="{{ route('properties.edit', $property->id) }}" class="px-6 py-2 rounded-lg font-medium text-white transition hover:opacity-90" style="background-color: #98A6A1;">
            Editar Propriedade
        </a>
        <a href="{{ route('properties.index') }}" class="px-6 py-2 rounded-lg font-medium text-gray-700 transition hover:bg-gray-100" style="background-color: #E5E7E9;">
            Voltar
        </a>
    </div>
    </div>
    <footer class="p-6 shadow-md flex justify-end items-center" style="background-color: #98A6A1;">
        <p class="text-gray-100">&copy; 2025 Domus Imobiliária. Todos os direitos reservados.</p>
    </footer>
</body>
</html>