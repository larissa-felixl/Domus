<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edite dados do seu cliente</title>
</head>
<body>
    <form action="{{ route('costumers.update', $costumer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" value="{{ old('name', $costumer->name) }}" required>
        @error('name')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email', $costumer->email) }}" required>
        @error('email')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        
        <label for="contracts">Contratos:</label>
        <input type="text" name="contracts" id="contracts" value="{{ old('contracts', $costumer->contracts ) }}" required>
        @error('contracts')
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