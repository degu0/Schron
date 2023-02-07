<title>Schron - Horário Segunda</title>
<?php require __DIR__ . "/../../share/head.php"; ?><br>
<link rel="stylesheet" href="/librares/css/table.css">
<div>
    <a href="/horario"><img src="/./images/sairv.png" alt="" width="55" height="55"></a>
    <p class="p">Quarta</p>
</div>
<table width="357" class="d">
    <tbody>
        <tr class="td">
            <td>Horário</td>
            <?php
            foreach ($listaTurma as $turma) { ?>
                <td> <?php
                        echo $turma->getSerie(); ?></td>
            <?php } ?>
        </tr>
        <?php foreach ($listaDisciplinaProfessor as $dp) { ?>
            <tr>
                <td> <?php echo $dp->getHorariroInicio() . " - " . $dp->getHorariroFim(); ?> </td>
                <?php
                foreach ($listaTurma as $turma) { ?>
                    <td> <?php
                            if ($dp->getTurma() == $turma->getSerie()) {
                                echo $dp->getNome(); ?>
                    </td>
            <?php }
                        } ?>
            </tr>
        <?php
        }
        ?>

    </tbody>
</table>
<?php require __DIR__ . "/../../share/footer.php"; ?>