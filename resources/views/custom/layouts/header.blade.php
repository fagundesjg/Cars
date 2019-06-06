<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css" />
    <link rel="stylesheet" href="/css/custom/home/styles.css" />
    <link href="https://fonts.googleapis.com/css?family=Kanit|Roboto&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d2e59d1f0d.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>
        @yield('title')
    </title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="/">Home</a></li>
            @if (Auth::user()->access_level === 'admin')
                <li><a href={{route('cadastrar-equipe')}}>Cadastrar Equipe</a></li>
            @endif
            @if (Auth::user()->access_level === 'admin')
                <li><a href={{route('selecionar-equipe')}}>Inserir Resultado Prova</a></li>
            @endif
            <li><a href="/logout" style="position: absolute; right: 5%">Logout</a></li>
        </ul>
    </nav>
    <div style="display: flex; flex-direction: column; align-items: center; justify-content: center">
        @yield('content')
    </div>
</body>
</html>
