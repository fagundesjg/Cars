<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="css/app.css" />
        <link rel="stylesheet" href="css/custom/login/styles.css" />
        <link href="https://fonts.googleapis.com/css?family=Kanit|Roboto&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Registrar</title>
    </head>
    <body class="content">
        <div class="box">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input
                        class="form-control"
                        id="name"
                        name="name"
                        placeholder="Digite seu nome"
                        type="text"
                        required
                    />
                    @if ($errors->has('name'))
                    <span class="alert alert-danger" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input
                        class="form-control"
                        id="email"
                        name="email"
                        placeholder="Digite seu email"
                        type="email"
                        required
                    />
                    @if ($errors->has('email'))
                    <span class="alert alert-danger" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password">Senha</label>
                    <input
                        class="form-control"
                        id="password"
                        name="password"
                        placeholder="Digite sua senha"
                        type="password"
                        required
                    />
                    @if ($errors->has('password'))
                    <span class="alert alert-danger" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password">Confirmar Senha</label>
                    <input
                        class="form-control"
                        id="password-confirm"
                        name="password_confirmation"
                        placeholder="Repita sua senha"
                        type="password"
                        required
                    />
                </div>
                @if (count($errors) > 0)
                    @foreach ($errors as $error)
                        <span class="alert alert-danger" role="alert">{{$error->getMessage()}}</div>
                    @endforeach
                @endif
                <div align="center">
                    <input
                        type="submit"
                        class="btn btn-primary btn-block"
                        value="Cadastrar    "
                        style="color: white"
                    />
                </div>
                <div align="center" style="padding-top: 15px">
                    <p>
                        Já possui conta?
                        <a href="{{ route('login') }}">Entrar</a>
                    </p>
                </div>
            </form>
        </div>
    </body>
</html>
