<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categoria - {{ $category->name }}</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-100 h-full flex flex-col">
    <header class="p-6 shadow-md flex justify-end items-center" style="background-color: #98A6A1;">
        <nav>
            <ul class="flex gap-4 p-2 rounded px-3 mr-7">
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
        <h1 class="m-5 font-bold text-xl text-gray-700">Categoria: {{ $category->name }} - Propriedades ({{ $category->properties->count() }})</h1>
    </div>
    
    <div class="m-7">
        <!-- Grid de propriedades -->
        @if($category->properties->isEmpty())
            <p class="text-gray-500 italic text-center py-8">Nenhuma propriedade cadastrada nesta categoria.</p>
        @else
            <div class="grid grid-cols-3 gap-5">
                @foreach($category->properties as $property)
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden border" style="border-color: #D5D8DC;">
                        <div class="h-16 flex items-center px-6" style="background-color: #98A6A1;">
                            <h4 class="text-lg font-bold text-white truncate">{{ $property->adress }}</h4>
                        </div>
                        <div class="p-6 flex gap-6">
                            <div class="flex-1">
                                <div class="space-y-2">
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
                                </div>
                                <div class="flex items-center gap-3 mt-4 pt-3 border-t" style="border-color: #D5D8DC;">
                                    <a href="{{ route('properties.show', $property->id) }}" class="text-sm font-medium hover:underline" style="color: #98A6A1;">Ver detalhes</a>
                                </div>
                            </div>
                            <div class="flex items-center justify-center">
                                @if($property->picture)
                                    <img src="{{ asset('storage/' . $property->picture) }}" alt="{{ $property->adress }}" class="w-32 h-32 object-cover rounded-lg shadow-md">
                                @else
                                    <div class="w-32 h-32 bg-gray-200 rounded-lg flex items-center justify-center">
                                        <span class="text-gray-400 text-xs">Sem foto</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        
        <div class="flex gap-3 mt-7">
            <a href="{{ route('categories.edit', $category->id) }}" class="px-6 py-2 rounded-lg font-medium text-white transition hover:opacity-90" style="background-color: #98A6A1;">
                Editar Categoria
            </a>
            <a href="{{ route('categories.index') }}" class="px-6 py-2 rounded-lg font-medium text-gray-700 transition hover:bg-gray-100" style="background-color: #E5E7E9;">
                Voltar
            </a>
        </div>
    </div>
    </div>
    <footer class="p-6 shadow-md flex justify-end items-center" style="background-color: #98A6A1;">
        <p class="text-gray-100">&copy; 2025 Domus Imobiliária. Todos os direitos reservados.</p>
    </footer>
</body>
</html>