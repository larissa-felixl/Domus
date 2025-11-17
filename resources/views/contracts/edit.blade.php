<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar o contrato {{ $contract->title }}</title>
</head>
<body>
    <form action="{{ route('contracts.update', $contract->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <label for="title">Título:</label>
        <input type="text" name="title" id="title" value="{{ old('title', $contract->title) }}" required>
        @error('title')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        
        <label for="file">Arquivo:</label>
        <p style="color: gray; font-size: 12px;">
            Arquivo atual: 
            <a href="{{ asset('storage/' . $contract->file) }}" target="_blank" style="color: blue;">
                📄 Ver arquivo atual
            </a>
        </p>
        <p style="color: gray; font-size: 12px;">Deixe em branco para manter o arquivo atual</p>
        <input type="file" name="file" id="file">
        @error('file')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        
        <label for="start_date">Data de Início:</label>
        <input type="date" name="start_date" id="start_date" value="{{ old('start_date', $contract->start_date) }}" required>
        @error('start_date')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        
        <label for="end_date">Data de Fim:</label>
        <input type="date" name="end_date" id="end_date" value="{{ old('end_date', $contract->end_date) }}">
        @error('end_date')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        
        <label for="value">Valor:</label>
        <input type="number" name="value" id="value" step="0.01" min="0" value="{{ old('value', $contract->value) }}" required>
        @error('value')
            <p style="color: red;">{{ $message }}</p>
        @enderror

         <label for="description">Descrição:</label>
        <textarea name="description" id="description" rows="3">{{ old('description', $contract->description) }}</textarea>
        @error('description')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        
        <label for="type">Tipo de contrato:</label>
        <select name="type" id="type" required>
            <option value="">Selecione...</option>
            <option value="compra" {{ old('type', $contract->type) == 'compra' ? 'selected' : '' }}>compra</option>
            <option value="venda" {{ old('type', $contract->type) == 'venda' ? 'selected' : '' }}>venda</option>
            <option value="locação" {{ old('type', $contract->type) == 'locação' ? 'selected' : '' }}>locação</option>
        </select>
        @error('type')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <label for="status">Status do contrato:</label>
        <select name="status" id="status" required>
            <option value="">Selecione...</option>
            <option value="pendente" {{ old('status', $contract->status) == 'pendente' ? 'selected' : '' }}>Pendente</option>
            <option value="finalizado" {{ old('status', $contract->status) == 'finalizado' ? 'selected' : '' }}>Finalizado</option>
        </select>
        @error('status')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        
        <input type="submit" value="Enviar">
    </form>

</body>
</html>
