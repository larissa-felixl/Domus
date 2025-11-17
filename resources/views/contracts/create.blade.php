<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar um novo contrato</title>
</head>
<body>
    <form action="{{ route('contracts.store') }}" method="POST">
        @csrf
        
        <label for="title">Título:</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}" required>
        @error('title')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        
        <label for="file">Arquivo:</label>
        <input type="file" name="file" id="file" value="{{ old('file') }}" required>
        @error('file')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        
        <label for="start_date">Data de Início:</label>
        <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}" required>
        @error('start_date')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        
        <label for="end_date">Data de Fim:</label>
        <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}" required>
        @error('end_date')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        
        <label for="value">Valor:</label>
        <input type="text" name="value" id="value" value="{{ old('value') }}" required>
        @error('value')
            <p style="color: red;">{{ $message }}</p>
        @enderror

         <label for="description">Descrição:</label>
        <input type="text" name="description" id="description" value="{{ old('description') }}" required>
        @error('description')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        
        <label for="type">Tipo de contrato:</label>
        <select name="type" id="type" required>
            <option value="">Selecione...</option>
            <option value="compra" {{ old('type') == 'compra' ? 'selected' : '' }}>compra</option>
            <option value="venda" {{ old('type') == 'venda' ? 'selected' : '' }}>venda</option>
            <option value="locação" {{ old('type') == 'locação' ? 'selected' : '' }}>locação</option>
        </select>
        @error('type')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <label for="status">Status da visita:</label>
        <select name="status" id="status" required>
            <option value="">Selecione...</option>
            <option value="pendente" {{ old('status') == 'pendente' ? 'selected' : '' }}>Pendente</option>
            <option value="finalizado" {{ old('status') == 'finalizado' ? 'selected' : '' }}>Finalizado</option>
        </select>
        @error('status')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        
        <input type="submit" value="Enviar">
    </form>

</body>
</html>
