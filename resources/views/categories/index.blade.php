<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias de propriedades</title>
    @vite(['resources/css/app.css'])
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
        <h1 class="m-5 font-bold text-xl text-gray-700">Categorias de propriedades</h1>
        <a href="{{ route('categories.create') }}" class="m-5 hover:underline transition text-gray-700">Cadastrar nova categoria</a>
    </div>
    <div class="m-7">
   @if($categories->isEmpty())
        <p class="text-gray-500 italic text-center py-8">Nenhuma categoria cadastrada</p>
    @else
    <div class="m-7 grid grid-cols-3 gap-5">
    @foreach($categories as $category)
        <div class="bg-white rounded-lg shadow-sm overflow-hidden border flex flex-col" style="border-color: #D5D8DC; aspect-ratio: 1.5/1;">
            <div class="h-16 flex items-center px-6" style="background-color: #98A6A1;">
                <h2 class="text-xl font-bold text-white">{{ $category->name }}</h2>
            </div>
                <div class="p-6 flex gap-6">
                <div class="flex-1">
                    <div class="space-y-3">
                        <div class="flex items-start">
                            <span class="font-medium text-gray-600 w-32">Tipo: {{ $category->type }}</span>
                        </div>
                        <div class="flex items-start">
                            <span class="font-medium text-gray-600 w-32">Descrição: {{ $category->description }}</span>
                        </div>

                    </div>
                    <div class="flex items-center gap-3 mt-6 pt-4 " style="border-color: #D5D8DC;">
                        <a href="{{ route('categories.show', $category->id) }}" class="px-4 py-2 rounded-lg text-gray-700 hover:bg-gray-100 transition font-medium">Ver</a>
                        <a href="{{ route('categories.edit', $category->id) }}" class="px-4 py-2 rounded-lg text-gray-700 hover:bg-gray-100 transition font-medium">Editar</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Tem certeza que deseja deletar este cliente?')" class="px-4 py-2 rounded-lg text-red-600 hover:bg-red-50 transition font-medium">Deletar</button>
                        </form>
                    </div>
                </div>
                <div class="flex items-center justify-center">
                    @if($category->picture)
                        <img src="{{ asset('storage/' . $category->picture) }}" alt="{{ $category->name }}" class="w-50 h-50 object-cover rounded-lg shadow-md">
                    @else
                        <div class="w-32 h-32 bg-gray-300 rounded-lg flex items-center justify-center">
                            <span class="text-gray-500 text-sm">Sem foto</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
    </div>
    </div>
    <footer class="p-6 shadow-md flex justify-end items-center" style="background-color: #98A6A1;">
        <p class="text-gray-100">&copy; 2025 Domus Imobiliária. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
