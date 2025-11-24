<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header class="bg-gray-200 text-black-500 p-6 shadow-md flex justify-end items-center ">
        <nav>
            <ul class="flex gap-4">
                <a href=""></a>
                <a href=""></a>
                <a href=""></a>
                <a href=""></a>
                <a href=""></a>
                <a href=""></a>
                <li class="m-3">Dashboard</li>
                <li class="m-3">Agenda</li>
                <li class="m-3">Propriedades</li>
                <li class="m-3">Clientes</li>
                <li class="m-3">Contratos</li>
                <li class="m-3">Perfil</li>
            </ul>
        </nav>
    </header>

    <div class="bg-blue-300 m-10 rounded-lg py-10">
        <h1 class="m-5">Agenda para o dia de Hoje ({{ date('d/m/Y') }})</h1> 
        <a href="{{ route('visits.index') }}" class="m-10 text-blue-600 hover:underline">Ver todas as visitas agendadas!</a>
    </div>
    <div>

        @if($visits->isEmpty())
            <p style="color: gray; font-style: italic;" class="m-9">Nenhuma visita agendada para hoje.</p>
        @else
            <div class="grid grid-cols-3 gap-6 m-10">
                @foreach ($visits as $visit)
                    <div  class="bg-red-300 border border-gray-300 p-6 rounded-lg shadow-md">
                        <h2 class="text-xl font-bold mb-3"><strong>Horário:</strong> {{ $visit->time }}</h2>
                        <p class="mb-2"><strong>Endereço:</strong> {{ $visit->address }}</p>
                        <p class="mb-2"><strong>Tipo:</strong> {{ $visit->type }}</p>
                        <p class="mb-2"><strong>Status:</strong> {{ $visit->status }}</p>
                        @if($visit->description)
                            <p class="mb-2"><strong>Descrição:</strong> {{ $visit->description }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    <div class="bg-blue-300 m-10 rounded-lg py-2">
        <h1 class="m-5"> Visualizar</h1> 
    </div>
    <div class="grid grid-cols-3 gap-6 m-10">
        <div class="bg-white border border-gray-300 rounded-lg shadow-md flex items-center overflow-hidden h-32">
            <div class="bg-blue-600 w-5 h-full"></div>
            <div class="p-6 flex items-center gap-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <div>
                    <h2 class="font-bold text-gray-700 text-xl">Contratos</h2>
                </div>
            </div>
        </div>
        
        <div class="bg-white border border-gray-300 rounded-lg shadow-md flex items-center overflow-hidden h-32">
            <div class="bg-green-600 w-5 h-full"></div>
            <div class="p-6 flex items-center gap-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-green-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <div>
                    <h2 class="font-bold text-gray-700 text-xl">Clientes</h2>
                </div>
            </div>
        </div>
        
        <div class="bg-white border border-gray-300 rounded-lg shadow-md flex items-center overflow-hidden h-32">
            <div class="bg-purple-600 w-5 h-full"></div>
            <div class="p-6 flex items-center gap-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-purple-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <div>
                    <h2 class="font-bold text-gray-700 text-xl">Propriedades</h2>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
