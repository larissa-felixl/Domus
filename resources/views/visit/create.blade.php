<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre uma nova visita</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 h-full flex flex-col">
    <header class="p-6 shadow-md flex justify-end items-center" style="background-color: #98A6A1;">
        <nav>
            <ul class="flex gap-4 p-2 rounded px-3 mr-7" >
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
        <h1 class="m-5 font-semibold text-xl text-gray-700">Cadastrar uma nova visita</h1>
    </div>

    <div class="m-7">
        <form action="{{ route('visits.store') }}" method="POST">
            @csrf
            
            <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                <h2 class="text-xl font-semibold text-gray-700 mb-6 pb-3 ">Preencha com as informações da Visita</h2>
                
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label for="date" class="block text-md font-semibold text-gray-600 mb-2">Data</label>
                        <input type="text" name="date" id="date" value="{{ old('date') }}" required 
                               class="date-input w-full px-4 py-2 border border-gray-400 rounded-lg focus:ring-2 focus:ring-gray-400 focus:border-transparent transition" placeholder="DD/MM/AAAA">
                        @error('date')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="time" class="block text-md font-semibold text-gray-600 mb-2">Hora</label>
                        <input type="text" name="time" id="time" value="{{ old('time') }}" required
                               class="time-input w-full px-4 py-2 border border-gray-400 rounded-lg focus:ring-2 focus:ring-gray-400 focus:border-transparent transition" placeholder="HH:MM">
                        @error('time')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="type" class="block text-md font-semibold text-gray-600 mb-2">Tipo de Visita</label>
                        <select name="type" id="type" required
                                class="w-full px-4 py-2 border border-gray-400 rounded-lg focus:ring-2 focus:ring-gray-400 focus:border-transparent transition">
                            <option value="">Selecione...</option>
                            <option value="Captação e avaliação" {{ old('type') == 'Captação e avaliação' ? 'selected' : '' }}>Captação e avaliação</option>
                            <option value="Apresentação" {{ old('type') == 'Apresentação' ? 'selected' : '' }}>Apresentação</option>
                            <option value="Técnica" {{ old('type') == 'Técnica' ? 'selected' : '' }}>Técnica</option>
                            <option value="Vistoria e documentação" {{ old('type') == 'Vistoria e documentação' ? 'selected' : '' }}>Vistoria e documentação</option>
                        </select>
                        @error('type')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="status" class="block text-md font-semibold text-gray-600 mb-2">Status</label>
                        <select name="status" id="status" required
                                class="w-full px-4 py-2 border border-gray-400 rounded-lg focus:ring-2 focus:ring-gray-400 focus:border-transparent transition">
                            <option value="">Selecione...</option>
                            <option value="Realizada" {{ old('status') == 'Realizada' ? 'selected' : '' }}>Realizada</option>
                            <option value="Pendente" {{ old('status') == 'Pendente' ? 'selected' : '' }}>Pendente</option>
                            <option value="Cancelada" {{ old('status') == 'Cancelada' ? 'selected' : '' }}>Cancelada</option>
                        </select>
                        @error('status')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="mt-6">
                    <label for="address" class="block text-md font-semibold text-gray-600 mb-2">Endereço</label>
                    <input type="text" name="address" id="address" value="{{ old('address') }}" required
                           class="w-full px-4 py-2 border border-gray-400 rounded-lg focus:ring-2 focus:ring-gray-400 focus:border-transparent transition">
                    @error('address')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mt-6">
                    <label for="description" class="block text-md font-semibold text-gray-600 mb-2">Descrição</label>
                    <textarea name="description" id="description" rows="3"
                              class="w-full px-4 py-2 border border-gray-400 rounded-lg focus:ring-2 focus:ring-gray-400 focus:border-transparent transition">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Botões de Ação -->
            <div class="flex gap-4">
                <button type="submit" class="px-8 py-3 rounded-lg shadow-sm text-white font-medium transition" style="background-color: #98A6A1;">
                    Cadastrar Visita
                </button>
                <a href="{{ route('visits.index') }}" class="px-8 py-3 rounded-lg shadow-sm text-gray-700 hover:text-gray-900 transition font-medium" style="background-color: #E5E7E9;">
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

