<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar um novo contrato</title>
</head>
<body>
    <form action="{{ route('contracts.store') }}" method="POST" enctype="multipart/form-data">
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
        <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}">
        @error('end_date')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        
        <label for="value">Valor:</label>
        <input type="number" name="value" id="value" step="0.01" min="0" value="{{ old('value') }}" required>
        @error('value')
            <p style="color: red;">{{ $message }}</p>
        @enderror

         <label for="description">Descrição:</label>
        <textarea name="description" id="description" rows="3">{{ old('description') }}</textarea>
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

        <label for="status">Status do contrato:</label>
        <select name="status" id="status" required>
            <option value="">Selecione...</option>
            <option value="pendente" {{ old('status') == 'pendente' ? 'selected' : '' }}>Pendente</option>
            <option value="finalizado" {{ old('status') == 'finalizado' ? 'selected' : '' }}>Finalizado</option>
        </select>
        @error('status')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <hr style="margin: 20px 0;">
        <h3>Vincular Clientes ao Contrato</h3>
        <p style="color: gray; font-size: 12px;">Selecione os clientes e defina o papel de cada um no contrato</p>
        
        <div id="costumers-container">
            <div class="costumer-row" style="margin-bottom: 15px; padding: 10px; border: 1px solid #ccc;">
                <label>Cliente:</label>
                <select name="costumers[]" style="width: 200px;">
                    <option value="">Selecione um cliente</option>
                    @foreach($costumers as $costumer)
                        <option value="{{ $costumer->id }}">{{ $costumer->name }}</option>
                    @endforeach
                </select>
                
                <label style="margin-left: 20px;">Papel:</label>
                <select name="roles[]" style="width: 200px;">
                    <option value="">Selecione o papel</option>
                    <option value="Locador">Locador</option>
                    <option value="Locatário">Locatário</option>
                    <option value="Comprador">Comprador</option>
                    <option value="Vendedor">Vendedor</option>
                    <option value="Fornecedor de Terreno">Fornecedor de Terreno</option>
                    <option value="Fiador">Fiador</option>
                    <option value="Testemunha">Testemunha</option>
                </select>
                
                <button type="button" onclick="this.parentElement.remove()" style="background: red; color: white; margin-left: 10px;">Remover</button>
            </div>
        </div>
        
        <button type="button" onclick="addCostumerRow()" style="background: green; color: white; padding: 10px; margin-bottom: 20px;">
            + Adicionar outro cliente
        </button>

        <script>
            function addCostumerRow() {
                const container = document.getElementById('costumers-container');
                const newRow = container.firstElementChild.cloneNode(true);
                
                // Limpar valores
                newRow.querySelector('select').selectedIndex = 0;
                newRow.querySelector('input').value = '';
                
                container.appendChild(newRow);
            }
        </script>
        
        <br><br>
        <input type="submit" value="Enviar">
    </form>

</body>
</html>
