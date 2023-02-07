<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/images/logo.png">
    <link rel="stylesheet" href="librares/css/login.css">
    <title>Schron - Login</title>
</head>

<body style="background-image: url('/images/wallpaperLogin.png');">
    <a href="/"><img src="/./images/entrar.png" alt="" class="sair"></a>
    <section class="area_login">
        <div class="login">
            <div>
                <img src="./images/logo.png">
            </div>
            <form action="/login/logar" method="POST">
            <?php
            if (isset($loginIncorreto)) {
                echo "Login não encontrado";
            } ?>
                <h1 class="Schron">SCHRON</h1>
                <p>Login:</p>
                <input type="text" name="login" placeholder="Username" autofocus required>
                <p>Senha:</p>
                <input type="password" name="senha" placeholder="Password" required>
                <button class="button"><img src="/./images/sair.png"></button>
            </form>
            <a>Ainda nao tem uma conta?</a><a href="/usuario/cadastro">Criar conta</a>
        </div>
    </section>
</body>

</html>