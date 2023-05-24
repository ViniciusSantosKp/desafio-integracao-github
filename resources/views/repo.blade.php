<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" media="screen">
    <title>Document</title>
</head>
<body>
    <h1>Detalhes do Repositório</h1>

    <br>
    <strong><p>Nome:  </strong>{{ $repo['name'] }}</p>
    <br>
    <strong><p>Descrição:  </strong> {{ $repo['description'] }}</p>
    <br>
    <strong><p>Número de Estrelas:  </strong> {{ $repo['stargazers_count'] }}</p>
    <br>
    <strong><p>Linguagem:  </strong> {{ $repo['language'] }}</p>
    <br>
    <br>
    <p><a href="{{ $repo['html_url'] }}" target="_blank">Link para o repositório</a></p>
</body>
</html>