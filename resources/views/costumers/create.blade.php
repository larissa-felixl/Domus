<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre uma nova propriedade</title>
</head>
<body>
    <form action="{{ route('costumers.store') }}" method="POST">
        @csrf
        
        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        @error('name')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required>
        @error('email')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        
        <label for="phone">Telefone:</label>
        <input type="text" name="phone" id="phone" value="{{ old('phone') }}" required>
        @error('phone')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        
        <label for="contracts">Contratos:</label>
        <input type="text" name="contracts" id="contracts" value="{{ old('contracts') }}" required>
        @error('contracts')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        
        <label for="type">Tipo de Cliente:</label>
        <select name="type" id="type" required>
            <option value="">Selecione...</option>
            <option value="Fornecedor" {{ old('type') == 'Fornecedor' ? 'selected' : '' }}>Fornecedor</option>
            <option value="Locatário" {{ old('type') == 'Locatário' ? 'selected' : '' }}>Locatário</option>
            <option value="Comprador" {{ old('type') == 'Comprador' ? 'selected' : '' }}>Comprador</option>
        </select>
        @error('type')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        
        <input type="submit" value="Enviar">
    </form>

</body>
</html>