<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edite a visita {{ $visit->id }}</title>
</head>
<body>
    <form action="{{ route('visits.update', $visit->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="date">Data:</label>
        <input type="date" name="date" id="date" value="{{ old('date', $visit->date) }}" required>
        @error('date')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        
        <label for="time">Hora:</label>
        <input type="time" name="time" id="time" value="{{ old('time', $visit->time) }}" required>
        @error('time')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        
        <label for="address">Endereço:</label>
        <input type="text" name="address" id="address" value="{{ old('address', $visit->address) }}" required>
        @error('address')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        
        <label for="description">Descrição:</label>
        <input type="text" name="description" id="description" value="{{ old('description', $visit->description) }}" required>
        @error('description')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        
        <label for="type">Tipo de visita:</label>
        <select name="type" id="type" required>
            <option value="">Selecione...</option>
            <option value="Captação e avaliação" {{ old('type', $visit->type) == 'Captação e avaliação' ? 'selected' : '' }}>Captação e avaliação</option>
            <option value="Apresentação" {{ old('type', $visit->type) == 'Apresentação' ? 'selected' : '' }}>Apresentação</option>
            <option value="Técnica" {{ old('type', $visit->type) == 'Técnica' ? 'selected' : '' }}>Técnica</option>
            <option value="Vistoria e documentação" {{ old('type', $visit->type) == 'Vistoria e documentação' ? 'selected' : '' }}>Vistoria e documentação</option>
        </select>
        @error('type')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <label for="status">Status da visita:</label>
        <select name="status" id="status" required>
            <option value="">Selecione...</option>
            <option value="Realizada" {{ old('status', $visit->status) == 'Realizada' ? 'selected' : '' }}>Realizada</option>
            <option value="Pendente" {{ old('status', $visit->status) == 'Pendente' ? 'selected' : '' }}>Pendente</option>
            <option value="Cancelada" {{ old('status', $visit->status) == 'Cancelada' ? 'selected' : '' }}>Cancelada</option>
        </select>
        @error('status')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        
        <input type="submit" value="Editar">
    </form>

</body>
</html>