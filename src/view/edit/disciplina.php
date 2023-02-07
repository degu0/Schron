<title>Schron - Cadastro Disciplina</title>
<?php require __DIR__ . "/../share/head.php"; ?><br>
<link rel="stylesheet" href="/librares/css/cadastro.css">
<div>
    <a href="/tabela/disciplina"><img src="/./images/sairv.png" alt=""></a>
</div>
<section class="area_login">
    <div class="login">
        <form action="/tabela/disciplina/update?id=<?php echo $disciplina->getId() ?>" method="POST">
            <table>
                <tr>
                    <h1 class="Schron"><b>Cadastro de disciplina</b></h1>
                    <td>
                        <div class="disciplina">
                            <div>
                                <label>Nome:</label><br>
                                <input type="text" name="Nome" id="Nome" required class="text" value="<?php echo $disciplina->getNome(); ?>">
                            </div>
                            <div style="margin-bottom: 10px;">
                                <label>Turma:</label><br>
                                <select id="Turma" name="Turma" class="form-select" aria-label="Default select example">
                                    <?php foreach ($listaTurma as $turma) { ?>
                                        <option value="<?php echo $turma->getId(); ?>"><?php echo $turma->getSerie(); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div style="margin-bottom: 10px;">
                                <label>Professor:</label><br>
                                <select id="Professor" name="Professor" class="form-select" aria-label="Default select example">
                                    <?php foreach ($listaProfessor as $professor) { ?>
                                        <option value="<?php echo $professor->getId(); ?>"><?php echo $professor->getNome(); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div>
                                <label>Quantidade por semana:</label><br>
                                <input type="number" name="Quantidade" id="Quantidade" required class="text" placeholder="Quantidade de aulas por semana" value="<?php echo $disciplina->getQuantidade(); ?>">
                            </div><br>
                            <div>
                                <label>Duplicidade de aulas:</label><br>
                                <input type="checkbox" name="Duplicidade" id="Duplicidade" value="Sim">
                                <label>Sim</label><br>
                                <input type="checkbox" name="Duplicidade" id="Duplicidade" value="Não">
                                <label>Não</label>
                            </div><br>
                            <button class="button"><img src="/./images/sair.png"></button>
                        </div>
                    </td>
                    <td>
                        <img src="/./images/disciplina.png" alt="" style='width: 315px; height: 270px;'>
                    </td>
                </tr>
            </table>
        </form>
        <?php require __DIR__ . "/../share/footer.php"; ?>