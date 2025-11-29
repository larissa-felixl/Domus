<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categoria - Criar</title>
</head>
<body>
    <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" required>
        @error('name')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        
        <label for="type">Tipo:</label>
        <select name="type" id="type" required>
            <option value="residencial" {{ old('type', $category->type) == 'residencial' ? 'selected' : '' }}>Residencial</option>
            <option value="comercial" {{ old('type', $category->type) == 'comercial' ? 'selected' : '' }}>Comercial</option>
        </select>
        @error('type')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        
        <label for="description">Descrição:</label>
        <textarea name="description" id="description">{{ old('description', $category->description) }}</textarea>
        @error('description')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <label for="picture">Imagem:</label>
        
        @if($category->picture)
            <div style="margin-bottom: 10px; padding: 10px; background-color: #f5f5f5; border: 1px solid #ddd; border-radius: 4px;">
                <p style="margin: 0 0 5px 0; color: #666; font-size: 14px;">Imagem atual:</p>
                <a href="{{ asset('storage/' . $category->picture) }}" target="_blank" style="color: #333; text-decoration: underline;">
                    {{ basename($category->picture) }}
                </a>
            </div>
        @endif
        
        <p style="color: #666; font-size: 14px; margin-bottom: 5px;">{{ $category->picture ? 'Deixe em branco para manter a imagem atual ou selecione uma nova para substituir' : 'Selecione uma imagem' }}</p>
        <input type="file" name="picture" id="picture" accept="image/*">
        @error('picture')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        
        <input type="submit" value="Enviar">
</body>
</html>