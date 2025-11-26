<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visita - {{ $visit->id }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
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
    <div class="m-7 rounded-lg py-3 shadow-sm" style="background-color: #E5E7E9;">
        <h1 class="m-5 font-bold text-lg text-gray-700">Detalhes da visita #{{ $visit->id }}</h1>
        <a href="{{ route('visits.create') }}" class="m-5 hover:underline transition text-gray-700">Adicionar nova visita à agenda</a>
    </div>

    <div class="rounded-lg shadow-sm border bg-white overflow-hidden m-7" style="border-color: #D5D8DC; ">
        <div class="py-3 px-4 border-b" style="background-color: #E5E7E9; border-color: #D5D8DC;">
            <h3 class="font-semibold text-lg text-gray-700">{{ \Carbon\Carbon::parse($visit->date)->format('d/m/Y') }}</h3>
        </div>
        
        <div class="p-4 space-y-2">
            <div>
                <span class="text-md font-semibold text-gray-500">Horário:</span>
                <p class="text-gray-800">{{ $visit->time }}</p>
            </div>
                            
            <div>
                <span class="text-md font-semibold text-gray-500">Endereço:</span>
                <p class="text-gray-800 text-sm">{{ $visit->address }}</p>
            </div>
                            
            <div>
                <span class="text-md font-semibold text-gray-500">Tipo:</span>
                <p class="text-gray-800 text-sm">{{ $visit->type }}</p>
            </div>
                            
            <div>
                <span class="text-md font-semibold text-gray-500">Status:</span>
                <span class="px-2 py-1 text-xs font-medium rounded-md {{ $visit->status === 'confirmada' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                    {{ $visit->status }}
                </span>
            </div>
                            
            @if($visit->description)
                <div>
                    <span class="text-md font-semibold text-gray-500">Descrição:</span>
                    <p class="text-gray-600 text-sm">{{ $visit->description }}</p>
                </div>
            @endif
        </div>
                        
        <!-- Footer com Ações -->
        <div class="px-4 py-3 border-t flex gap-3 justify-center" style="border-color: #D5D8DC; background-color: #F9FAFB;">
            <a href="{{ route('visits.show', $visit->id) }}" class="text-gray-600 hover:text-gray-800 transition text-sm font-medium">Ver</a>
            <a href="{{ route('visits.edit', $visit->id) }}" class="text-gray-600 hover:text-gray-800 transition text-sm font-medium">Editar</a>
            <form action="{{ route('visits.destroy', $visit->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Tem certeza que deseja deletar essa visita da agenda?')" 
                        class="text-red-600 hover:text-red-800 transition text-sm font-medium">
                    Deletar
                </button>
            </form>
        </div>
    </div>
    
    