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
        
        <label for="phone">Telefone:</label>
        <input type="text" name="phone" id="phone" value="{{ old('phone', $costumer->phone) }}" required>
        @error('phone')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        
        <label for="contracts">Contratos:</label>
        <input type="text" name="contracts" id="contracts" value="{{ old('contracts', $costumer->contracts ) }}" required>
        @error('contracts')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        
        <label for="type">Tipo de Cliente:</label>
        <select name="type" id="type" required>
            <option value="">Selecione...</option>
            <option value="Fornecedor" {{ old('type', $costumer->type) == 'Fornecedor' ? 'selected' : '' }}>Fornecedor</option>
            <option value="Locatário" {{ old('type', $costumer->type) == 'Locatário' ? 'selected' : '' }}>Locatário</option>
            <option value="Comprador" {{ old('type', $costumer->type) == 'Comprador' ? 'selected' : '' }}>Comprador</option>
        </select>
        @error('type')
            <p style="color: red;">{{ $message }}</p>
        @enderror

       <label for="status">Status do cliente:</label>
        <select name="status" id="status" required>
            <option value="">Selecione...</option>
            <option value="Ativo" {{ old('status', $costumer->status) == 'Ativo' ? 'selected' : '' }}>Ativo</option>
            <option value="Inativo" {{ old('status', $costumer->status) == 'Inativo' ? 'selected' : '' }}>Inativo</option>
        </select>
        @error('status')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        
        <input type="submit" value="Editar">
    </form>

</body>
</html>