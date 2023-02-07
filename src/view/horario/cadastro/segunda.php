<title>Schron - Horário Segunda</title>
<?php require __DIR__ . "/../../share/head.php"; ?><br>
<link rel="stylesheet" href="/librares/css/table.css">
<div>
    <a href="/horario"><img src="/./images/sairv.png" alt="" width="55" height="55"></a>
    <p class="p">Segunda</p>
</div>
<form action="/horario/segunda/add" method="POST">

    <table width="357" class="d">
    <?php
            if (isset($erro)) {
                echo "Login não encontrado";
            } ?>
        <tbody>
            <tr class="td">
                <td>Horário</td>
                <?php $c = null;
                foreach ($listaTurma as $turma) { ?>
                    <td> <?php
                            $c++;
                            echo $turma->getSerie(); ?></td>
                <?php } ?>
            </tr>
            <?php
            foreach ($listaEnsino as $ensino) {
                $quant_aula = $ensino->getAula(); ///
            }
            $i = 0;
            while ($i != $quant_aula) { ?>
                <tr>
                    <td> <input type="time" name="timeInicial[]" id="timeInicial[]" class="time"> <input type="time" name="timeFinal[]" id="timeFinal[]" class="time"> </td>
                    <?php foreach ($listaTurma as $turma) { ?>
                        <td>
                            <select id="Disciplina<?php echo $i ?><?php echo $turma->getSerie(); ?>" name="Disciplina<?php echo $i . "_" ?><?php echo $turma->getSerie(); ?>" class="form-select" aria-label="Default select example">
                                <?php foreach ($listaDisciplinaProfessor as $dp) {
                                    $resultado = null;
                                    if ($dp->getTurma() == $turma->getSerie()) { ?>
                                        <option value="<?php echo $dp->getNome() . "|" . $turma->getSerie() . "|" . $dp->getDuplicidade(). "|" . $dp->getId(); ?>">
                                            <div style="height: 15px;  border-radius: 3px;"> </div>
                                            <?php echo $dp->getNome() ?>
                                        </option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </td>
                    <?php } ?>
                    <?php $i++ ?>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <div>
        <input type="submit" value="cadastrar" class="button">
    </div>
</form>
<?php require __DIR__ . "/../../share/footer.php"; ?>