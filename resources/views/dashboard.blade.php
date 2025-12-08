<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 h-full flex flex-col">
    <header class="p-6 shadow-md flex justify-between items-center" style="background-color: #98A6A1;">
        <div>
            <img src="{{ asset('images/domus.png') }}" alt="logo" class="h-15 w-40">
        </div>
        <nav>
            <ul class="flex gap-4 p-2 rounded px-3">
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
        <h1 class="m-5 font-semibold text-gray-700">Agenda para o dia de Hoje ({{ date('d/m/Y') }})</h1> 
        <a href="{{ route('visits.index') }}" class="m-5 hover:underline transition text-gray-700">Ver todas as visitas agendadas!</a>
    </div>
    
    <div>

        @if($visits->isEmpty())
            <p style="color: gray; font-style: italic;" class="m-9">Nenhuma visita agendada para hoje.</p>
        @else
            <div class="grid grid-cols-4 gap-6 m-7">
                @foreach ($visits as $visit)
                    <div class="p-4 rounded-lg shadow-sm border bg-white" style="border-color: #D5D8DC;">
                        <h2 class="text-lg font-bold mb-2 text-gray-700"><strong>Horário:</strong> {{ $visit->time }}</h2>
                        <p class="mb-1 text-sm text-gray-600"><strong>Endereço:</strong> {{ $visit->address }}</p>
                        <p class="mb-1 text-sm text-gray-600"><strong>Tipo:</strong> {{ $visit->type }}</p>
                        <p class="mb-1 text-sm text-gray-600"><strong>Status:</strong> {{ $visit->status }}</p>
                        @if($visit->description)
                            <p class="mb-1 text-sm text-gray-600"><strong>Descrição:</strong> {{ $visit->description }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <div class="m-7 rounded-lg py-3 shadow-sm" style="background-color: #E5E7E9;">
        <h1 class="m-5 font-semibold text-gray-700">Navegação Rápida</h1>
    </div>

    <div class="grid grid-cols-4 gap-6 m-7">
        <div class="bg-white border rounded-lg shadow-sm flex items-center overflow-hidden h-40" style="border-color: #D5D8DC;">
            <div class="w-5 h-full" style="background-color: #98A6A1;"></div>
            <div class="p-6 flex items-center gap-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <div>
                    <a href="{{ route('contracts.index') }}" class="font-bold text-xl text-gray-700 hover:text-gray-400 ">Contratos</a>
                </div>
            </div>
        </div>
        
        <div class="bg-white border rounded-lg shadow-sm flex items-center overflow-hidden h-40" style="border-color: #D5D8DC;">
            <div class="w-5 h-full" style="background-color: #98A6A1;"></div>
            <div class="p-6 flex items-center gap-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <div>
                    <a href="{{ route('costumers.index') }}" class="font-bold text-xl transition text-gray-700 hover:text-gray-400">Clientes</a>
                </div>
            </div>
        </div>
        
        <div class="bg-white border rounded-lg shadow-sm flex items-center overflow-hidden h-40" style="border-color: #D5D8DC;">
            <div class="w-5 h-full" style="background-color: #98A6A1;"></div>
            <div class="p-6 flex items-center gap-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <div>
                    <a href="{{ route('properties.index') }}" class="font-bold text-xl transition text-gray-700 hover:text-gray-400">Propriedades</a>
                </div>
            </div>
        </div>
        
        <div class="bg-white border rounded-lg shadow-sm flex items-center overflow-hidden h-40" style="border-color: #D5D8DC;">
            <div class="w-5 h-full" style="background-color: #98A6A1;"></div>
            <div class="p-6 flex items-center gap-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                </svg>
                <div>
                    <a href="{{ route('categories.index') }}" class="font-bold text-xl transition text-gray-700 hover:text-gray-400">Categorias</a>
                </div>
            </div>
        </div>
    </div>
    </div>
    
    <footer class="p-6 shadow-md flex justify-end items-center" style="background-color: #98A6A1;">
        <p class="text-gray-100">&copy; 2025 Domus Imobiliária. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
