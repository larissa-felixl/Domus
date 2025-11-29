<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categoria - Criar</title>
</head>
<body>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        
        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        @error('name')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        
        <label for="type">Tipo:</label>
        <select name="type" id="type" required>
            <option value="residencial" {{ old('type') == 'residencial' ? 'selected' : '' }}>Residencial</option>
            <option value="comercial" {{ old('type') == 'comercial' ? 'selected' : '' }}>Comercial</option>
        </select>
        @error('type')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        
        <label for="description">Descrição:</label>
        <textarea name="description" id="description">{{ old('description') }}</textarea>
        @error('description')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        
        <input type="submit" value="Enviar">
</body>
</html>