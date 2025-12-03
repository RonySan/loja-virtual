<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adega Store</title>

    <style>
        body {
            margin: 0;
            background: #0b0b0b; /* Preto elegante */
            color: #e5e5e5;     /* Prata */
            font-family: Arial, sans-serif;
        }

        header {
            background: #111;
            padding: 20px;
            text-align: center;
            border-bottom: 2px solid #c9a100; /* Dourado */
        }

        main {
            padding: 25px;
        }

        h1, h2, h3 {
            color: #c9a100; /* Dourado premium */
        }

        a {
            color: #c9a100;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            color: #e5e5e5;
        }

        table {
            width: 100%;
            margin-top: 15px;
            border-collapse: collapse;
            background: #1a1a1a;
            border: 1px solid #444;
        }

        th {
            background: #111;
            padding: 12px;
            border-bottom: 2px solid #c9a100;
            color: #c9a100;
            text-align: left;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #333;
        }

        button {
            background: #c9a100;
            border: none;
            color: #111;
            padding: 8px 12px;
            cursor: pointer;
            font-weight: bold;
            border-radius: 4px;
        }

        button:hover {
            background: #e5e5e5;
            color: #111;
        }
    </style>
</head>
<body>

    @isset($header)
        <header>
            {{ $header }}
        </header>
    @endisset

   <body>

    @include('layouts.sidebar')

    <main style="margin-left: 220px; padding: 25px;">
        @yield('content')
    </main>

</body>


</body>
</html>
