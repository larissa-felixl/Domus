<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoria</title>
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
            </ul>
        </nav>
    </header>
    <div class="flex-1">
    <div class="m-7 rounded-lg py-3 shadow-sm" style="background-color: #E5E7E9;">
        <h1 class="m-5 font-bold text-xl text-gray-700">Editar Categoria</h1>
    </div>

    <div class="m-7">
        <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                <h2 class="text-xl font-semibold text-gray-700 mb-6 pb-3 border-b" style="border-color: #D5D8DC;">Informações da Categoria</h2>
                
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-600 mb-2">Nome</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" required
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
                            <option value="residencial" {{ old('type', $category->type) == 'residencial' ? 'selected' : '' }}>Residencial</option>
                            <option value="comercial" {{ old('type', $category->type) == 'comercial' ? 'selected' : '' }}>Comercial</option>
                        </select>
                        @error('type')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="col-span-2">
                        <label for="description" class="block text-sm font-semibold text-gray-600 mb-2">Descrição</label>
                        <textarea name="description" id="description" rows="4"
                                  class="w-full px-4 py-2 border border-gray-400 rounded-lg focus:ring-2 focus:ring-gray-400 focus:border-transparent transition">{{ old('description', $category->description) }}</textarea>
                        @error('description')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-2">
                        <label for="picture" class="block text-sm font-semibold text-gray-600 mb-2">Imagem</label>
                        
                        @if($category->picture)
                            <div class="mb-3 p-3 rounded-lg flex items-center gap-3" style="background-color: #E5E7E9;">
                                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <div class="flex-1">
                                    <p class="text-sm text-gray-600">Imagem atual:</p>
                                    <a href="{{ asset('storage/' . $category->picture) }}" target="_blank" class="text-sm font-medium text-gray-800 hover:underline">
                                        {{ basename($category->picture) }}
                                    </a>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 mb-2">Deixe em branco para manter a imagem atual ou selecione uma nova para substituir</p>
                        @endif
                        
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
                    Salvar Alterações
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