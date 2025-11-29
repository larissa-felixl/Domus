<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias de propriedades</title>
</head>
<body>
    @if ($categories->isEmpty())
        <p>Nenhuma categoria cadastrada</p>
    @else
        <div>
            @foreach ($categories as $category)
                <div style="border: 1px solid #000; padding: 10px; margin-bottom: 10px;">
                    <h2>{{ $category->name }}</h2>
                    <p><strong>Tipo:</strong> {{ $category->type }}</p>
                    <p><strong>Descrição:</strong> {{ $category->description }}</p>
                </div>
            @endforeach
        </div>
    @endif
</body>
</html>