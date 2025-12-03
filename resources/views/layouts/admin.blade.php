<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Admin - Adega Store</title>

    {{-- Bootstrap 5 via CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

    {{-- Navbar simples --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">🏪 Adega Store</a>
            <div>
                <a class="nav-link text-white" href="{{ route('categories.index') }}">Categorias</a>
                <a class="nav-link text-white" href="{{ route('products.index') }}">Produtos</a>
            </div>
        </div>
    </nav>

    @yield('content')

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
