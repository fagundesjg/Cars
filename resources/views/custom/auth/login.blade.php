<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="css/app.css" />
        <link rel="stylesheet" href="css/custom/login/styles.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="https://fonts.googleapis.com/css?family=Kanit|Roboto&display=swap" rel="stylesheet">
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Login</title>
    </head>
    <body class="content">
        <div class="box">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Login</label>
                    <input
                        class="form-control"
                        id="email"
                        name="email"
                        placeholder="Digite seu e-mail"
                        type="email"
                        required
                    />
                    @if ($errors->has('email'))
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </div>
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
                <div align="center">
                    <input
                        type="submit"
                        class="btn btn-primary btn-block"
                        value="Entrar"
                        style="color: white"
                    />
                </div>
                <div align="center" style="padding-top: 15px">
                    <p>
                        Não possui conta?
                        <a href="{{ route('register') }}">Cadastrar</a>
                    </p>
                </div>
            </form>
        </div>
    </body>
</html>
