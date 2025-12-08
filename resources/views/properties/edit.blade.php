<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar propriedade</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 h-full flex flex-col">
    <header class="p-6 shadow-md flex justify-between items-center" style="background-color: #98A6A1;"><div><img src="{{ asset('images/domus.png') }}" alt="logo" class="h-15 w-40"></div><nav>
            <ul class="flex gap-4 p-2 rounded px-3 mr-7" >
                <a href="{{ route('dashboard') }}" class="text-gray-100 hover:text-gray-300 transition">Dashboard</a>
                <a href="{{ route('visits.index') }}" class="text-gray-100 hover:text-gray-300 transition">Agenda</a>
                <a href="{{ route('categories.index') }}" class="text-gray-100 hover:text-gray-300 transition">Categorias</a>
                <a href="{{ route('properties.index') }}" class="text-gray-100 hover:text-gray-300 transition">Propriedades</a>
                <a href="{{ route('costumers.index') }}" class="text-gray-100 hover:text-gray-300 transition">Clientes</a>
                <a href="{{ route('contracts.index') }}" class="text-gray-100 hover:text-gray-300 transition">Contratos</a><form method="POST" action="{{ route('logout') }}" class="inline ml-4">@csrf<button type="submit" class="text-gray-100 hover:text-gray-300 transition">Sair</button></form></ul>
        </nav>
    </header>
    <div class="flex-1">
    <div class="m-7 rounded-lg py-3 shadow-sm" style="background-color: #E5E7E9;">
        <h1 class="m-5 font-bold text-xl text-gray-700">Editar propriedade</h1>
    </div>

    <div class="m-7">
        <form action="{{ route('properties.update', $property->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                <h2 class="text-xl font-semibold text-gray-700 mb-6 pb-3 border-b" style="border-color: #D5D8DC;">Informações da Propriedade</h2>
                
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label for="adress" class="block text-sm font-semibold text-gray-600 mb-2">Endereço</label>
                        <input type="text" name="adress" id="adress" value="{{ old('adress', $property->adress) }}" required
                               class="w-full px-4 py-2 border border-gray-400 rounded-lg focus:ring-2 focus:ring-gray-400 focus:border-transparent transition">
                        @error('adress')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="price" class="block text-sm font-semibold text-gray-600 mb-2">Preço</label>
                        <input type="text" name="price" id="price" value="{{ old('price', $property->price) }}" required
                               class="currency-input w-full px-4 py-2 border border-gray-400 rounded-lg focus:ring-2 focus:ring-gray-400 focus:border-transparent transition" placeholder="R$ 0,00">
                        @error('price')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="type" class="block text-sm font-semibold text-gray-600 mb-2">Tipo</label>
                        <input type="text" name="type" id="type" value="{{ old('type', $property->type) }}" required
                               class="w-full px-4 py-2 border border-gray-400 rounded-lg focus:ring-2 focus:ring-gray-400 focus:border-transparent transition">
                        @error('type')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="status" class="block text-sm font-semibold text-gray-600 mb-2">Status</label>
                        <select name="status" id="status" required
                                class="w-full px-4 py-2 border border-gray-400 rounded-lg focus:ring-2 focus:ring-gray-400 focus:border-transparent transition">
                            <option value="">Selecione...</option>
                            <option value="disponivel" {{ old('status', $property->status) == 'disponivel' ? 'selected' : '' }}>Disponível</option>
                            <option value="indisponivel" {{ old('status', $property->status) == 'indisponivel' ? 'selected' : '' }}>Indisponível</option>
                        </select>
                        @error('status')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="category_id" class="block text-sm font-semibold text-gray-600 mb-2">Categoria</label>
                        <select name="category_id" id="category_id"
                                class="w-full px-4 py-2 border border-gray-400 rounded-lg focus:ring-2 focus:ring-gray-400 focus:border-transparent transition">
                            <option value="">Selecione uma categoria</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $property->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }} ({{ $category->type }})
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="owner_name" class="block text-sm font-semibold text-gray-600 mb-2">Nome do Proprietário</label>
                        <input type="text" name="owner_name" id="owner_name" value="{{ old('owner_name', $property->owner_name) }}"
                               class="w-full px-4 py-2 border border-gray-400 rounded-lg focus:ring-2 focus:ring-gray-400 focus:border-transparent transition">
                        @error('owner_name')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="mt-6">
                    <label for="picture" class="block text-sm font-semibold text-gray-600 mb-2">Foto</label>
                    
                    @if($property->picture)
                        <div class="mb-3 p-3 bg-gray-50 border border-gray-300 rounded-lg">
                            <p class="text-sm text-gray-600 mb-2">Foto atual:</p>
                            <a href="{{ asset('storage/' . $property->picture) }}" target="_blank" class="text-gray-600 hover:text-gray-800 underline transition inline-flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                {{ basename($property->picture) }}
                            </a>
                        </div>
                    @endif
                    
                    <p class="text-sm text-gray-500 mb-2">{{ $property->picture ? 'Deixe em branco para manter a foto atual ou selecione uma nova para substituir' : 'Selecione uma foto' }}</p>
                    <input type="file" name="picture" id="picture" accept="image/*"
                           class="w-full px-4 py-2 border border-gray-400 rounded-lg focus:ring-2 focus:ring-gray-400 focus:border-transparent transition file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200">
                    @error('picture')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Botões de Ação -->
            <div class="flex gap-4">
                <button type="submit" class="px-8 py-3 rounded-lg shadow-sm text-white font-medium transition" style="background-color: #98A6A1;">
                    Editar Propriedade
                </button>
                <a href="{{ route('properties.index') }}" class="px-8 py-3 rounded-lg shadow-sm text-gray-700 hover:text-gray-900 transition font-medium" style="background-color: #E5E7E9;">
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

