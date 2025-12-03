<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo - Adega Store</title>

    {{-- Bootstrap CDN (caso não esteja usando Tailwind ou outro CSS) --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

    {{-- Navbar simples --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Adega Store</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}">Categorias</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('produtos.index') }}">Produtos</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        {{-- Aqui entra o conteúdo da página --}}
        @yield('content')
    </div>

    {{-- Bootstrap scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
