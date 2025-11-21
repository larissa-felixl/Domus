<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header class="bg-gray-200 text-black-500 p-4 shadow-md flex justify-end items-center ">
        <nav>
            <ul class="flex gap-4">
                <li class="m-3">Dashboard</li>
                <li class="m-3">Agenda</li>
                <li class="m-3">Propriedades</li>
                <li class="m-3">Clientes</li>
                <li class="m-3">Contratos</li>
                <li class="m-3">Perfil</li>
            </ul>
        </nav>
        <div>
            <h1>Agenda para o dia de Hoje</h1>
            @foreach ($visits as $visit)
                <div>
                    <h2>{{ $visit->time }}</h2>
                    <p>{{ $visit->adress }}</p>
                </div>
            @endforeach
        </div>
    </header>
</body>
</html>
