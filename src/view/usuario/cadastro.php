<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/images/logo.png">
    <link rel="stylesheet" href="/librares/css/cad_user.css">

    <title>Schron - Cadastrar</title>
</head>

<bodys>

    <main>
        <section class="login">
            <a href="/"><img src="/./images/sairv.png" alt=""></a>
            <div class="wrapper">
                
                <img src="/images/logo.png" class="login__logo">

                <h1 class="login__title">SCHRON</h1>
                <form action="/usuario/add" method="POST">
                    <label class="login__label">
                        <span>Nome do usuário:</span>
                        <input type="text" name="login" class="input" id="login" required>
                    </label>
                    <label class="login__label">
                        <span>Nome da Instituição:</span>
                        <input type="text" name="inst" class="input" id="inst" required>
                    </label>

                    <label class="login__label">
                        <span>Senha:</span>
                        <input type="password" name="senha" class="input" id="senha" required>
                    </label>

                    <label class="login__label">
                        <span>Confirme sua senha:</span>
                        <input type="password" name="cSenha" class="input" id="cSenha" required>
                    </label>
            </div>

            <div class="wrapper">
                <button class="login__button">
                    <img src="/images/sair.png" alt="">
                </button>
            </div>
            </form>
        </section>

        <section class=" wallpaper">
        </section>
    </main>

</body>

</html>