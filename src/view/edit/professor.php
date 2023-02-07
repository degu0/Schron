<title>Schron - Cadastro de Professor</title>
<?php require __DIR__ . "/../share/head.php"; ?><br>
<link rel="stylesheet" href="/librares/css/cadastro.css">
<div>
    <a href="/tabela/professor"><img src="/./images/sairv.png" alt=""></a>
</div>
<section class="area_login">
    <div class="login">
        <form action="/tabela/professor/update?id=<?php echo $professor->getId() ?>" method="POST">
            <table>
                <tr>
                    <h1 class="Schron"><b>Cadastro de professor</b></h1>
                    <td>
                        <div class="professor">
                            <div>
                                <!-- Cadastro do nome do professor -->
                                <label>Nome:</label><br>
                                <input type="text" name="Nome" id="Nome" required class="text" value="<?php echo $professor->getNome(); ?>">
                            </div>
                            <div>
                                <!-- Guarde a string (char) da cor e use as fucntions ColorToString e StringToColor para converter. -->
                                <label>Cor do professor:</label><br>
                                <input type="color" name="cor_prof" id="cor_prof" value="<?php echo $professor->getCor(); ?>" required class="color">
                            </div>
                            <div>
                                <!-- Cadastro da carga horaria do professor -->
                                <label>Carga:</label><br>
                                <input type="number" name="Carga" id="Carga" required class="text" value="<?php echo $professor->getCarga(); ?>">
                            </div><br>
                            <button class="button"><img src="/./images/sair.png"></button>
                        </div>
                    </td>
                    <td>
                        <img src="/./images/professor.png" alt="" style='width: 315px; height: 270px;'>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    </form>
    <?php require __DIR__ . "/../share/footer.php"; ?>