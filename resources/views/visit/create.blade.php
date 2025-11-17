<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre uma nova visita</title>
</head>
<body>
    <form action="{{ route('visits.store') }}" method="POST">
        @csrf
        
        <label for="date">Data:</label>
        <input type="text" name="date" id="date" value="{{ old('date') }}" required>
        @error('date')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        
        <label for="time">Hora:</label>
        <input type="text" name="time" id="time" value="{{ old('time') }}" required>
        @error('time')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        
        <label for="address">Endereço:</label>
        <input type="text" name="address" id="address" value="{{ old('address') }}" required>
        @error('address')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        
        <label for="description">Descrição:</label>
        <input type="text" name="description" id="description" value="{{ old('description') }}" required>
        @error('description')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        
        <label for="type">Tipo de visita:</label>
        <select name="type" id="type" required>
            <option value="">Selecione...</option>
            <option value="Captação e avaliação" {{ old('type') == 'Captação e avaliação' ? 'selected' : '' }}>Captação e avaliação</option>
            <option value="Apresentação" {{ old('type') == 'Apresentação' ? 'selected' : '' }}>Apresentação</option>
            <option value="Técnica" {{ old('type') == 'Técnica' ? 'selected' : '' }}>Técnica</option>
            <option value="Vistoria e documentação" {{ old('type') == 'Vistoria e documentação' ? 'selected' : '' }}>Vistoria e documentação</option>
        </select>
        @error('type')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        
        <input type="submit" value="Enviar">
    </form>

</body>
</html>