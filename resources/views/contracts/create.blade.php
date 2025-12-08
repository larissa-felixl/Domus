<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar um novo contrato</title>
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
                <a href="{{ route('contracts.index') }}" class="text-gray-100 hover:text-gray-300 transition">Contratos</a>
            </ul>
        </nav>
    </header>
    <div class="flex-1">
    <div class="m-7 rounded-lg py-3 shadow-sm" style="background-color: #E5E7E9;">
        <h1 class="m-5 font-bold text-lg text-gray-700">Cadastrar um novo contrato</h1>
    </div>

    <div class="m-7">
        <form action="{{ route('contracts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                <h2 class="text-xl font-semibold text-gray-700 mb-6 pb-3">Preencha com as informações do Contrato</h2>
                
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label for="title" class="block text-sm font-semibold text-gray-600 mb-2">Título</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" required 
                               class="w-full px-4 py-2 border border-gray-400 rounded-lg focus:ring-2 focus:ring-gray-400 focus:border-transparent transition">
                        @error('title')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="value" class="block text-sm font-semibold text-gray-600 mb-2">Valor</label>
                        <input type="text" name="value" id="value" value="{{ old('value') }}" required
                               class="currency-input w-full px-4 py-2 border border-gray-400 rounded-lg focus:ring-2 focus:ring-gray-400 focus:border-transparent transition" placeholder="R$ 0,00">
                        @error('value')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="start_date" class="block text-sm font-semibold text-gray-600 mb-2">Data de Início</label>
                        <input type="text" name="start_date" id="start_date" value="{{ old('start_date') }}" required
                               class="date-input w-full px-4 py-2 border border-gray-400 rounded-lg focus:ring-2 focus:ring-gray-400 focus:border-transparent transition" placeholder="DD/MM/AAAA">
                        @error('start_date')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="end_date" class="block text-sm font-semibold text-gray-600 mb-2">Data de Fim</label>
                        <input type="text" name="end_date" id="end_date" value="{{ old('end_date') }}"
                               class="date-input w-full px-4 py-2 border border-gray-400 rounded-lg focus:ring-2 focus:ring-gray-400 focus:border-transparent transition" placeholder="DD/MM/AAAA">
                        @error('end_date')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="type" class="block text-sm font-semibold text-gray-600 mb-2">Tipo de Contrato</label>
                        <select name="type" id="type" required
                                class="w-full px-4 py-2 border border-gray-400 rounded-lg focus:ring-2 focus:ring-gray-400 focus:border-transparent transition">
                            <option value="">Selecione...</option>
                            <option value="compra" {{ old('type') == 'compra' ? 'selected' : '' }}>Compra</option>
                            <option value="venda" {{ old('type') == 'venda' ? 'selected' : '' }}>Venda</option>
                            <option value="locação" {{ old('type') == 'locação' ? 'selected' : '' }}>Locação</option>
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
                            <option value="pendente" {{ old('status') == 'pendente' ? 'selected' : '' }}>Pendente</option>
                            <option value="finalizado" {{ old('status') == 'finalizado' ? 'selected' : '' }}>Finalizado</option>
                        </select>
                        @error('status')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="mt-6">
                    <label for="description" class="block text-sm font-semibold text-gray-600 mb-2">Descrição</label>
                    <textarea name="description" id="description" rows="3"
                              class="w-full px-4 py-2 border border-gray-400 rounded-lg focus:ring-2 focus:ring-gray-400 focus:border-transparent transition">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mt-6">
                    <label for="file" class="block text-sm font-semibold text-gray-600 mb-2">Arquivo</label>
                    <input type="file" name="file" id="file" required
                           class="w-full px-4 py-2 border border-gray-400 rounded-lg focus:ring-2 focus:ring-gray-400 focus:border-transparent transition file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200">
                    @error('file')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Seção: Vincular Clientes -->
            <div class="bg-white rounded-lg shadow-sm p-6 mb-6" >
                <h2 class="text-xl font-semibold text-gray-700 mb-6 pb-3 ">Vincular Clientes ao Contrato</h2>
                <p class="text-gray-700 text-md mb-6">Selecione os clientes e defina o papel de cada um no contrato</p>
                
                <div id="costumers-container" class="space-y-4">
                    <div class="costumer-row border border-gray-400 rounded-lg p-4 bg-gray-50">
                        <div class="grid grid-cols-3 gap-4 items-end">
                            <div>
                                <label class="block text-sm font-semibold text-gray-600 mb-2">Cliente</label>
                                <select name="costumers[]" class="w-full px-4 py-2 border border-gray-400 rounded-lg focus:ring-2 focus:ring-gray-400 focus:border-transparent transition">
                                    <option value="">Selecione um cliente</option>
                                    @foreach($costumers as $costumer)
                                        <option value="{{ $costumer->id }}">{{ $costumer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-semibold text-gray-600 mb-2">Papel</label>
                                <select name="roles[]" class="w-full px-4 py-2 border border-gray-400 rounded-lg focus:ring-2 focus:ring-gray-400 focus:border-transparent transition">
                                    <option value="">Selecione o papel</option>
                                    <option value="Locador">Locador</option>
                                    <option value="Locatário">Locatário</option>
                                    <option value="Comprador">Comprador</option>
                                    <option value="Vendedor">Vendedor</option>
                                    <option value="Fornecedor de Terreno">Fornecedor de Terreno</option>
                                    <option value="Fiador">Fiador</option>
                                    <option value="Testemunha">Testemunha</option>
                                </select>
                            </div>
                            
                            <div>
                                <button type="button" onclick="this.closest('.costumer-row').remove()" 
                                        class="w-full px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition font-medium">
                                    Remover
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <button type="button" onclick="addCostumerRow()" 
                        class="mt-4 px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition font-medium inline-flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Adicionar outro cliente
                </button>
            </div>

            <!-- Botões de Ação -->
            <div class="flex gap-4">
                <button type="submit" class="px-8 py-3 rounded-lg shadow-sm text-white font-medium transition" style="background-color: #98A6A1;">
                    Cadastrar Contrato
                </button>
                <a href="{{ route('contracts.index') }}" class="px-8 py-3 rounded-lg shadow-sm text-gray-700 hover:text-gray-900 transition font-medium" style="background-color: #E5E7E9;">
                    Cancelar
                </a>
            </div>
        </form>
    </div>

    <script>
        function addCostumerRow() {
            const container = document.getElementById('costumers-container');
            const firstRow = container.querySelector('.costumer-row');
            const newRow = firstRow.cloneNode(true);
            
            // Limpar valores dos selects
            newRow.querySelectorAll('select').forEach(select => {
                select.selectedIndex = 0;
            });
            
            container.appendChild(newRow);
        }
    </script>
    </div>
    <footer class="p-6 shadow-md flex justify-end items-center" style="background-color: #98A6A1;">
        <p class="text-gray-100">&copy; 2025 Domus Imobiliária. Todos os direitos reservados.</p>
    </footer>
</body>
</html>

