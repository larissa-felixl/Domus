<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 h-full flex flex-col">
    <header class="p-6 shadow-md flex justify-end items-center" style="background-color: #98A6A1;">
        <nav>
            <ul class="flex gap-4 p-2 rounded px-3">
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
        <h1 class="m-5 font-bold text-lg text-gray-700">Todos os clientes cadastrados</h1>
        <a href="{{ route('costumers.create') }}" class="m-5 hover:underline transition text-gray-700">Adicionar novo cliente</a>
    </div>

    <div class="m-7 grid grid-cols-3 gap-5">
        @if($costumers->isEmpty())
            <p class="text-gray-500 italic text-center py-8 col-span-2">Nenhum cliente cadastrado</p>
        @else 
            @foreach($costumers as $costumer)
                <div class="bg-white rounded-lg shadow-sm overflow-hidden border" style="border-color: #D5D8DC;">
                    <!-- Barra verde no topo -->
                    <div class="h-16 flex items-center px-6" style="background-color: #98A6A1;">
                        <h2 class="text-xl font-bold text-white">{{ $costumer->name }}</h2>
                    </div>
                    
                    <!-- Conteúdo: informações e foto lado a lado -->
                    <div class="p-6 flex gap-6">
                        <!-- Informações do cliente -->
                        <div class="flex-1">
                            <div class="space-y-3">
                                <div class="flex items-start">
                                    <span class="font-medium text-gray-600 w-32">Email: {{ $costumer->email }}</span>
                                </div>
                                <div class="flex items-start">
                                    <span class="font-medium text-gray-600 w-32">Telefone: {{ $costumer->phone }}</span>
                                </div>
                                <div class="flex items-start">
                                    <span class="font-medium text-gray-600 w-32">Tipo: {{ $costumer->type }}</span>
                                </div>
                                <div class="flex items-start">
                                    <span class="font-medium text-gray-600 w-32">Status: {{ $costumer->status }}</span>
                                </div>
                                <div class="flex items-start">
                                    <span class="font-medium text-gray-600 w-32">Contratos: {{ $costumer->contractsList->count() }}</span>
                                </div>
                            </div>

                            <div class="flex items-center gap-3 mt-6 pt-4 " style="border-color: #D5D8DC;">
                                <a href="{{ route('costumers.show', $costumer->id) }}" class="px-4 py-2 rounded-lg text-gray-700 hover:bg-gray-100 transition font-medium">Ver</a>
                                <a href="{{ route('costumers.edit', $costumer->id) }}" class="px-4 py-2 rounded-lg text-gray-700 hover:bg-gray-100 transition font-medium">Editar</a>
                                <form action="{{ route('costumers.destroy', $costumer->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Tem certeza que deseja deletar este cliente?')" class="px-4 py-2 rounded-lg text-red-600 hover:bg-red-50 transition font-medium">Deletar</button>
                                </form>
                            </div>
                        </div>

                        <!-- Foto do cliente -->
                        <div class="flex items-center justify-center">
                            @if($costumer->picture)
                                <img src="{{ asset('storage/' . $costumer->picture) }}" alt="{{ $costumer->name }}" class="w-50 h-50 object-cover rounded-lg shadow-md">
                            @else
                                <div class="w-32 h-32 bg-gray-300 rounded-lg flex items-center justify-center">
                                    <span class="text-gray-500 text-sm">Sem foto</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>   
            @endforeach
        @endif  
    </div>
    </div>
    <footer class="p-6 shadow-md flex justify-end items-center" style="background-color: #98A6A1;">
        <p class="text-gray-100">&copy; 2025 Domus Imobiliária. Todos os direitos reservados.</p>
    </footer>
</body>
</html>