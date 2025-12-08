<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Domus</title>
    @vite(['resources/css/app.css'])
</head>
<body class="min-h-screen flex items-center justify-center" style="background-color: #98A6A1;">
    <div class="w-full max-w-md">
        <!-- Card -->

         <!-- Logo -->
            <div class="flex justify-center mb-6">
                <img src="{{ asset('images/domus.png') }}" alt="Domus Logo" class="h-16">
            </div>

        <div class="rounded-2xl shadow-2xl p-8" style="background-color: #E5E7E9;">
            <!-- Header -->
            <div class="mb-8 text-center">
                <h2 class="text-2xl font-bold" style="color: #98A6A1;">Login</h2>
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="mb-4 text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-4">
                    <input 
                        id="email" 
                        type="email" 
                        name="email" 
                        value="{{ old('email') }}"
                        placeholder="E-mail"
                        required 
                        autofocus
                        class="w-full px-4 py-3 bg-white border-0 rounded-lg text-gray-700 placeholder-gray-400 focus:ring-2 focus:outline-none transition shadow-sm"
                        style="focus:ring-color: #98A6A1;"
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

                <!-- Forgot Password -->
                @if (Route::has('password.request'))
                    <div class=" mb-6">
                        <a href="{{ route('password.request') }}" class="text-sm text-gray-600 hover:text-gray-800 transition">
                            Esqueceu sua senha?
                        </a>
                    </div>
                @endif

                <!-- Login Button -->
                <button 
                    type="submit"
                    class="w-full py-3 text-white font-semibold rounded-lg transition shadow-lg hover:shadow-xl hover:opacity-90"
                    style="background-color: #98A6A1;"
                >
                    Entrar
                </button>

                <!-- Register Link -->
                @if (Route::has('register'))
                    <div class="text-center mt-6">
                        <span class="text-gray-600 text-sm">Não tem uma conta? </span>
                        <a href="{{ route('register') }}" class="text-gray-700 hover:text-gray-900 text-sm font-medium transition underline">
                            Cadastre-se
                        </a>
                    </div>
                @endif
            </form>
        </div>
    </div>
</body>
</html>
