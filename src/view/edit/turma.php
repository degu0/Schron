<title>Schron - Cadastro Turma</title>
<?php require __DIR__ . "/../share/head.php"; ?><br>
<link rel="stylesheet" href="/librares/css/cadastro.css">
<div>
    <a href="/tabela/turma"><img src="/./images/sairv.png" alt=""></a>
</div>
<section class="area_login">
    <div class="login">
        <form action="/tabela/turma/update?id=<?php echo $turma->getId() ?>" method="POST">
            <table>
                <tr>
                    <h1 class="Schron"><b>Cadastros de Turmas</b></h1>
                    <td>
                        <div class="turma">
                            <div style="margin-bottom: 10px;">
                                <label>Serie:</label><br>
                                <input type="text" name="Serie" id="Serie"  value="<?php echo $turma->getSerie(); ?>" required class="text">
                            </div>
                            <div style="margin-bottom: 10px;">
                                <label>Ensino:</label>
                                <div class="dropdown">
                                    <select class="form-select" aria-label="Default select example" name="Ensino" id="Ensino">
                                        <?php foreach ($listaEnsino as $ensino) { ?>
                                            <option value="<?php echo $ensino->getId(); ?>"><?php echo $ensino->getEnsino(); ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div style="margin-bottom: 10px;">
                                <label>Curso:</label><br>
                                <input type="text" name="Curso" id="Curso" required class="text" value="<?php echo $turma->getCurso(); ?>">
                            </div>
                            <div>
                                <label>Turma:</label><br>
                                <input type="text" name="Turma" id="Turma" required class="text" value="<?php echo $turma->getTurma(); ?>">
                            </div>
                            <button class="button"><img src="/./images/sair.png"></button>
                    </td>
                    <td>
                        <img src="/./images/turma.png" alt="" style='width: 330px; height: 270px;'>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</section>
<?php require __DIR__ . "/../share/footer.php"; ?>