<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar cliente</title>
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
                <a href="{{ route('contracts.index') }}" class="text-gray-100 hover:text-gray-300 transition">Contratos</a><form method="POST" action="{{ route('logout') }}" class="inline ml-4">@csrf<button type="submit" class="text-gray-100 hover:text-gray-300 transition">Sair</button></form></ul>
        </nav>
    </header>
    <div class="flex-1">
    <div class="m-7 rounded-lg py-3 shadow-sm" style="background-color: #E5E7E9;">
        <h1 class="m-5 font-bold text-lg text-gray-700">Editar cliente</h1>
    </div>

    <div class="m-7">
        <form action="{{ route('costumers.update', $costumer->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                <h2 class="text-xl font-semibold text-gray-700 mb-6 pb-3 border-b">Informações do Cliente</h2>
                
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-600 mb-2">Nome</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $costumer->name) }}" required 
                               class="w-full px-4 py-2 border border-gray-400 rounded-lg focus:ring-2 focus:ring-gray-400 focus:border-transparent transition">
                        @error('name')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-600 mb-2">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $costumer->email) }}" required
                               class="w-full px-4 py-2 border border-gray-400 rounded-lg focus:ring-2 focus:ring-gray-400 focus:border-transparent transition">
                        @error('email')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="phone" class="block text-sm font-semibold text-gray-600 mb-2">Telefone</label>
                        <input type="text" name="phone" id="phone" value="{{ old('phone', $costumer->phone) }}" required
                               class="phone-input w-full px-4 py-2 border border-gray-400 rounded-lg focus:ring-2 focus:ring-gray-400 focus:border-transparent transition" placeholder="(XX) XXXXX-XXXX">
                        @error('phone')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="type" class="block text-sm font-semibold text-gray-600 mb-2">Tipo de Cliente</label>
                        <select name="type" id="type" required
                                class="w-full px-4 py-2 border border-gray-400 rounded-lg focus:ring-2 focus:ring-gray-400 focus:border-transparent transition">
                            <option value="">Selecione...</option>
                            <option value="Fornecedor" {{ old('type', $costumer->type) == 'Fornecedor' ? 'selected' : '' }}>Fornecedor</option>
                            <option value="Locatário" {{ old('type', $costumer->type) == 'Locatário' ? 'selected' : '' }}>Locatário</option>
                            <option value="Comprador" {{ old('type', $costumer->type) == 'Comprador' ? 'selected' : '' }}>Comprador</option>
                        </select>
                        @error('type')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="status" class="block text-sm font-semibold text-gray-600 mb-2">Status</label>
                        <select name="status" id="status" required
                                class="w-full px-4 py-2 border border-gray-400 rounded-lg focus:ring-2 focus:ring-gray-400 focus:border-transparent transition">
                            <option value="">Selecione...</option>
                            <option value="Ativo" {{ old('status', $costumer->status) == 'Ativo' ? 'selected' : '' }}>Ativo</option>
                            <option value="Inativo" {{ old('status', $costumer->status) == 'Inativo' ? 'selected' : '' }}>Inativo</option>
                        </select>
                        @error('status')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="mt-6">
                    <label for="picture" class="block text-sm font-semibold text-gray-600 mb-2">Foto</label>
                    
                    @if($costumer->picture)
                        <div class="mb-3 p-3 bg-gray-50 border border-gray-300 rounded-lg">
                            <p class="text-sm text-gray-600 mb-2">Foto atual:</p>
                            <a href="{{ asset('storage/' . $costumer->picture) }}" target="_blank" class="text-gray-600 hover:text-gray-800 underline transition inline-flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                {{ basename($costumer->picture) }}
                            </a>
                        </div>
                    @endif
                    
                    <p class="text-sm text-gray-500 mb-2">{{ $costumer->picture ? 'Deixe em branco para manter a foto atual ou selecione uma nova para substituir' : 'Selecione uma foto' }}</p>
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
                    Cadastrar Cliente
                </button>
                <a href="{{ route('costumers.index') }}" class="px-8 py-3 rounded-lg shadow-sm text-gray-700 hover:text-gray-900 transition font-medium" style="background-color: #E5E7E9;">
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

