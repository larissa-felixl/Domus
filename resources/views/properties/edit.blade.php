<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edite a sua propriedade</title>
</head>
<body>
    <form action="{{ route('properties.update', $property->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="adress">Endereço:</label>
        <input type="text" name="adress" id="adress" value="{{ old('adress', $property->adress) }}" required>
        @error('adress')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        
        <label for="price">Preço:</label>
        <input type="number" name="price" id="price" step="0.01" value="{{ old('price', $property->price) }}" required>
        @error('price')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        
        <label for="type">Tipo:</label>
        <input type="text" name="type" id="type" value="{{ old('type', $property->type ) }}" required>
        @error('type')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        
        <label for="status">Status:</label>
        <input type="text" name="status" id="status" value="{{ old('status', $property->status) }}" required>
        @error('status')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        
        <label for="owner_name">Nome do Proprietário:</label>
        <input type="text" name="owner_name" id="owner_name" value="{{ old('owner_name', $property->owner_name) }}">
        @error('owner_name')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        
        <input type="submit" value="Enviar">
    </form>

</body>
</html>