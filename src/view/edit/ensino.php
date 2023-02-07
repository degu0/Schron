<title>Schron - Cadastro de Ensino</title>
<?php require __DIR__ . "/../share/head.php"; ?><br>
<link rel="stylesheet" href="/librares/css/cadastro.css">
<div>
    <a href="/tabela/ensino"><img src="/./images/sairv.png" alt=""></a>
</div>

<section class="area_login">
    <div class="login">
        <form action="/tabela/ensino/update?id=<?php echo $ensino->getId() ?>" method="POST">
            <h1 class="Schron"><b>Cadastro de Ensino</b></h1>
            <table>
                <tr>
                    <td>
                        <div class="ensino">
                            <div style="margin-bottom: 10px;">
                                <label>Ensino:</label><br>
                                <input type="text" name="Ensino" id="Ensino" value="<?php echo $ensino->getEnsino(); ?>" required class="text">
                            </div>
                            <div style="margin-bottom: 10px;">
                                <label>Aula:</label><br>
                                <input type="number" name="Aula" id="Aula" value="<?php echo $ensino->getAula(); ?>" required class="text">
                            </div>
                        </div>
                        <button class="button"><img src="/./images/sair.png"></button>
                    </td>
                    <td>
                        <img src="/./images/ensino.png" alt="" style='width: 270px; height: 270px;'>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</section>
<?php require __DIR__ . "/../share/footer.php"; ?>