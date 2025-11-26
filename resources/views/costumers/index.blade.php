<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 ">
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
        <h1 class="m-5 font-bold text-lg text-gray-700">Todos os clientes cadastrados</h1>
        <a href="{{ route('costumers.create') }}" class="m-5 hover:underline transition text-gray-700">Adicionar novo cliente</a>
    </div>

    <div class="m-7">
        @if($costumers->isEmpty())
            <p class="text-gray-500 italic text-center py-8">Nenhum cliente cadastrado</p>
        @else
            <div>
                <table class="w-full">
                    <thead>
                        <tr class="border-b" style="background-color: #E5E7E9;">
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">ID</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Nome</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Email</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Telefone</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Qtd. Contratos</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Tipo</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Status</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($costumers as $costumer)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $costumer->id }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $costumer->name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $costumer->email }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $costumer->phone }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $costumer->contractsList->count() }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $costumer->type }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $costumer->status }}</td>
                                <td class="px-6 py-4 text-sm text-center">
                                    <div  class="flex items-center justify-center gap-3">
                                        <a href="{{ route('costumers.show', $costumer->id) }}" class="text-gray-600 hover:text-gray-800 transition font-medium">Ver</a>
                                        <a href="{{ route('costumers.edit', $costumer->id) }}" class="text-gray-600 hover:text-gray-800 transition font-medium">Editar</a>
                                        <form action="{{ route('costumers.destroy', $costumer->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Tem certeza que deseja deletar este cliente?')" class="text-red-600 hover:text-red-800 transition font-medium">Deletar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif  
    </div>  
</body>
</html>