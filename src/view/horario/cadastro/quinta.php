<title>Schron - Horário Quinta</title>
<?php require __DIR__ . "/../../share/head.php"; ?><br>
<link rel="stylesheet" href="/librares/css/table.css">
<div>
    <a href="/horario"><img src="/./images/sairv.png" alt="" width="55" height="55"></a>
    <p class="p"><b>Quinta</b></p>
</div>
<form action="/horario/quinta/add" method="POST">
    <table width="357" border="1px" class="d">
        <tbody>
            <tr class="td">
                <td>Horário</td>
                <?php foreach ($listaTurma as $turma) { ?>
                    <td> <?php echo $turma->getSerie(); ?></td>
                <?php } ?>
            </tr>
            <?php
            foreach ($listaEnsino as $ensino) {
                $quant_aula = $ensino->getAula();
            }
            $i = 0;
            while ($i != $quant_aula) { ?>
                <tr>
                    <td> <input type="time" name="timeInicial" id="timeInicial" class="time"> à <input type="time" name="timeFinal" id="timeFinal" class="time"> </td>
                    <?php foreach ($listaTurma as $turma) { ?>
                        <td>
                            <select id="Disciplina<?php echo $i ?><?php echo $turma->getId(); ?>" name="Disciplina<?php echo $i . "_" ?><?php echo $turma->getId(); ?>" class="form-select" aria-label="Default select example">
                                <?php foreach ($listaQDisciplinaProfessor as $dp) { ?>
                                    <option value="<?php echo $dp->getNome(); ?>"><?php echo $dp->getNome(); ?></option>
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