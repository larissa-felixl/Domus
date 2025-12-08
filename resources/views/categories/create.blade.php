<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Categoria</title>
    @vite(['resources/css/app.css'])
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
        <h1 class="m-5 font-bold text-xl text-gray-700">Cadastrar Nova Categoria</h1>
    </div>

    <div class="m-7">
        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                <h2 class="text-xl font-semibold text-gray-700 mb-6 pb-3 border-b" style="border-color: #D5D8DC;">Informações da Categoria</h2>
                
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-600 mb-2">Nome</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required
                               class="w-full px-4 py-2 border border-gray-400 rounded-lg focus:ring-2 focus:ring-gray-400 focus:border-transparent transition">
                        @error('name')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="type" class="block text-sm font-semibold text-gray-600 mb-2">Tipo</label>
                        <select name="type" id="type" required
                                class="w-full px-4 py-2 border border-gray-400 rounded-lg focus:ring-2 focus:ring-gray-400 focus:border-transparent transition">
                            <option value="">Selecione...</option>
                            <option value="residencial" {{ old('type') == 'residencial' ? 'selected' : '' }}>Residencial</option>
                            <option value="comercial" {{ old('type') == 'comercial' ? 'selected' : '' }}>Comercial</option>
                        </select>
                        @error('type')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="col-span-2">
                        <label for="description" class="block text-sm font-semibold text-gray-600 mb-2">Descrição</label>
                        <textarea name="description" id="description" rows="4"
                                  class="w-full px-4 py-2 border border-gray-400 rounded-lg focus:ring-2 focus:ring-gray-400 focus:border-transparent transition">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-2">
                        <label for="picture" class="block text-sm font-semibold text-gray-600 mb-2">Imagem</label>
                        <input type="file" name="picture" id="picture" accept="image/*"
                               class="w-full px-4 py-2 border border-gray-400 rounded-lg focus:ring-2 focus:ring-gray-400 focus:border-transparent transition file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200">
                        @error('picture')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="flex gap-3">
                <button type="submit" class="px-6 py-3 rounded-lg font-medium text-white transition hover:opacity-90 shadow-sm" style="background-color: #98A6A1;">
                    Cadastrar Categoria
                </button>
                <a href="{{ route('categories.index') }}" class="px-6 py-3 rounded-lg font-medium text-gray-700 transition hover:bg-gray-100 shadow-sm" style="background-color: #E5E7E9;">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
    </div>
    <footer class="p-6 shadow-md flex justify-end items-center" style="background-color: #98A6A1;">
        <p class="text-gray-100">&copy; 2025 Domus Imobiliária. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
