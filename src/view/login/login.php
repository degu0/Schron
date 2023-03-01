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

<body>
    <a href="/"><img src="/./images/entrar.png" alt="Voltar para o home" id="sair"></a>
    <section id="area_login">
        <article id="login">
            <div>
                <img src="./images/logo.png" alt="Schron">
            </div>
            <form action="/login/logar" method="POST">
            <?php
            if (isset($loginIncorreto)) {
                echo "Login não encontrado";
            } ?>
                <h1 id="Schron">SCHRON</h1>
                <label for="ilogin">Login: </label>
                <input type="text" name="login" id="ilogin" placeholder="Username" autofocus required>
                <label for="isenha">Senha: </label>
                <input type="password" name="senha"  id="isenha" placeholder="Password" required>
                <button id="button"><img src="/./images/sair.png"></button>
            </form>
            <p>Ainda nao tem uma conta?<a href="/usuario/cadastro">Criar conta</a></p>
        </article>
    </section>
</body>

</html>