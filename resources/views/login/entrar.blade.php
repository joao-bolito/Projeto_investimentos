<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport"  content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="{{asset('style.css')}}">
    </head>
    <body>
        <div class="container">
            <div class="wrapper">
                <a href="#"></a><h2>Entrar</h2>
                <form id="formCadastro" name="formulario" action="{{route('validaEntrar')}}" method="POST">
                    @csrf
                    <div class="input-box">
                        <input type="email" name="email" id="email" placeholder="insira seu email" required>
                    </div>
                    <div class="input-box">
                        <input id="txtSenha" name="txtSenha" type="password" placeholder="insira sua senha" minlength="5" required> <!-- minlength e maxlenght são usadas para limitar caracteres em um campo input-->
                    </div>
                    <div class="input-box button">
                        <input type="submit" value="Confirmar">
                    </div>
                </form>
            </div>
        </div>


        {{-- Modal --}}

        <div class="modal" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Falha no login</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>Email ou senha incorretas</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
              </div>
            </div>
          </div>
