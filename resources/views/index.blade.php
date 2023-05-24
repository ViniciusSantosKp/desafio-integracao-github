<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" media="screen">
    <title>Api GitHub</title>
</head>
<body>
    <h1>Buscar Usuário no GitHub</h1>

    <br>
    <form action="{{ route('search-user') }}" method="get">
        @csrf
        <label for="name">Nome de Usuário:</label>
        <input type="text" name="name" id="name" required>
        <button type="submit">Buscar</button>
    </form>
</body>
</html>