<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="icon" href="{{ asset('pie-chart.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body>
    <div class="container">
        <div class="wrapper">
            <a href="#"></a>
            <h2>Registro</h2>
            <form id="formCadastro" name="formulario" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="input-box">
                    <input type="text" name="userName" id="userName" placeholder="Insira seu nome" required>
                </div>
                <div class="input-box">
                    <input type="email" name="email" id="email" placeholder="insira seu email" required>
                </div>
                <div class="input-box">
                    <input id="txtSenha" name="txtSenha" type="password" placeholder="Crie uma senha" minlength="5"
                        required> <!-- minlength e maxlenght são usadas para limitar caracteres em um campo input-->
                </div>
                <div class="input-box">
                    <input id="repetir_senha" name="repetir_senha" type="password" placeholder="Repita a senha"
                        required>
                </div>
                <div class="policy">
                    <input type="checkbox" required>
                    <h3>Aceito todos os termos e condições</h3>
                </div>
                <div class="input-box button">
                    <input type="submit" value="Confirmar">
                </div>
                <div class="text">
                    <h3>Já possui conta? <a href="{{ route('entrar') }}">Login</a></h3>
                </div>
            </form>
        </div>
    </div>
</body>
