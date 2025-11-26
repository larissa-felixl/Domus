<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de visitas</title>
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
        <h1 class="m-5 font-bold text-lg text-gray-700">Visitas Agendadas</h1>
        <a href="{{ route('visits.create') }}" class="m-5 hover:underline transition text-gray-700">Adicionar nova visita à agenda</a>
    </div>

    
    @if ($visits->isEmpty())
        <p>Nenhuma visita agendada.</p>
    @else
        @foreach ($visits as $visit)
            <div class="m-7 p-4 rounded-lg shadow-sm border bg-white" style="border-color: #D5D8DC;">
                <p>Id: {{ $visit->id }}</p>
                <p>Data: {{ $visit->date }}</p>
                <p>Horário: {{ $visit->time }}</p>      
                <p>Endereço: {{ $visit->address }}</p>
                <p>Descrição: {{ $visit->description }}</p>
                <p>Tipo: {{ $visit->type }}</p>
                <p>Status: {{ $visit->status }}</p>
                <a href="{{ route('visits.show', $visit->id) }}">Ver</a>
                <a href="{{ route('visits.edit', $visit->id) }}">Editar</a>
                <form action="{{ route('visits.destroy', $visit->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Tem certeza que deseja deletar essa visita da agenda?')">Deletar</button>
                </form>
                        
        @endforeach  
    @endif
</body>
</html>