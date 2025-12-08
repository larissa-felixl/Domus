<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Domus</title>
    @vite(['resources/css/app.css'])
</head>
<body class="min-h-screen flex items-center justify-center" style="background-color: #98A6A1;">
    <div class="w-full max-w-md">
        <!-- Card -->
         <div class="flex justify-center mb-6">
                <img src="{{ asset('images/domus.png') }}" alt="Domus Logo" class="h-16">
            </div>
        <div class="rounded-2xl shadow-2xl p-8" style="background-color: #E5E7E9;">
            <!-- Logo -->
            

            <!-- Header -->
            <div class="mb-8 text-center">
                <h2 class="text-2xl font-bold" style="color: #98A6A1;">Cadastro</h2>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-4">
                    <input 
                        id="name" 
                        type="text" 
                        name="name" 
                        value="{{ old('name') }}"
                        placeholder="Nome"
                        required 
                        autofocus
                        class="w-full px-4 py-3 bg-white border-0 rounded-lg text-gray-700 placeholder-gray-400 focus:ring-2 focus:outline-none transition shadow-sm"
                    />
                    @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <input 
                        id="email" 
                        type="email" 
                        name="email" 
                        value="{{ old('email') }}"
                        placeholder="E-mail"
                        required
                        class="w-full px-4 py-3 bg-white border-0 rounded-lg text-gray-700 placeholder-gray-400 focus:ring-2 focus:outline-none transition shadow-sm"
                    />
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <input 
                        id="password" 
                        type="password" 
                        name="password"
                        placeholder="Senha"
                        required
                        class="w-full px-4 py-3 bg-white border-0 rounded-lg text-gray-700 placeholder-gray-400 focus:ring-2 focus:outline-none transition shadow-sm"
                    />
                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-6">
                    <input 
                        id="password_confirmation" 
                        type="password" 
                        name="password_confirmation"
                        placeholder="Confirmar Senha"
                        required
                        class="w-full px-4 py-3 bg-white border-0 rounded-lg text-gray-700 placeholder-gray-400 focus:ring-2 focus:outline-none transition shadow-sm"
                    />
                    @error('password_confirmation')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Register Button -->
                <button 
                    type="submit"
                    class="w-full py-3 text-white font-semibold rounded-lg transition shadow-lg hover:shadow-xl hover:opacity-90"
                    style="background-color: #98A6A1;"
                >
                    Cadastrar
                </button>

                <!-- Login Link -->
                <div class="text-center mt-6">
                    <span class="text-gray-600 text-sm">Já tem uma conta? </span>
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900 text-sm font-medium transition underline">
                        Faça login
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>