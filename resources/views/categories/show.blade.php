<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category->name }}</title>
</head>
<body>
    <h1>{{ $category->name }}</h1>
    <p><strong>Tipo:</strong> {{ $category->type }}</p>
    <p><strong>Descrição:</strong> {{ $category->description }}</p>
    
    @if($category->picture)
        <div>
            <img src="{{ asset('storage/' . $category->picture) }}" alt="{{ $category->name }}" style="max-width: 300px; height: auto;">
        </div>
    @endif
    
    <hr style="margin: 30px 0;">
    
    <h2>Propriedades nesta categoria ({{ $category->properties->count() }})</h2>
    
    @if($category->properties->isEmpty())
        <p style="color: gray; font-style: italic;">Nenhuma propriedade cadastrada nesta categoria.</p>
    @else
        <div>
            @foreach($category->properties as $property)
                <div style="border: 1px solid #ccc; padding: 15px; margin-bottom: 15px; border-radius: 5px;">
                    <h3>{{ $property->adress }}</h3>
                    <p><strong>Preço:</strong> R$ {{ number_format($property->price, 2, ',', '.') }}</p>
                    <p><strong>Tipo:</strong> {{ $property->type }}</p>
                    <p><strong>Status:</strong> {{ $property->status }}</p>
                    @if($property->owner_name)
                        <p><strong>Proprietário:</strong> {{ $property->owner_name }}</p>
                    @endif
                    <a href="{{ route('properties.show', $property->id) }}" style="color: blue; text-decoration: underline;">Ver detalhes</a>
                </div>
            @endforeach
        </div>
    @endif
    
    <div style="margin-top: 30px;">
        <a href="{{ route('categories.index') }}" style="padding: 10px 20px; background-color: #ddd; text-decoration: none; color: #333; border-radius: 5px;">Voltar para categorias</a>
        <a href="{{ route('categories.edit', $category->id) }}" style="padding: 10px 20px; background-color: #4CAF50; text-decoration: none; color: white; border-radius: 5px; margin-left: 10px;">Editar categoria</a>
    </div>
</body>
</html>