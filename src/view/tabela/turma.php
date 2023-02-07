<title>Schron - Tabela turma</title>
<?php require __DIR__ . "//../share/head.php"; ?>
<link rel="stylesheet" href="/librares/css/table.css">
<table width="357" border="1px" class="d">
    <div>
        <a href="/construct"><img src="/./images/sairv.png" alt="" width="55" height="55"></a>
        <p class="p">Turma</p>
    </div>
    <h3><a href="/cadastro/turma" class="add"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
            </svg> <b>adicionar</b></a></h3>
    <tbody>
        <tr class="td">
            <td>Serie</td>
            <td>Curso</td>
            <td>Ensino</td>
            <td>Turma</td>
            <td>Ações</td>
        </tr>
        <?php foreach ($listaTurma as $turma) { ?>

            <tr>
                <td colspan="1"> <?php echo $turma->getSerie(); ?></td>
                <td colspan="1"> <?php echo $turma->getCurso(); ?></td>
                <td colspan="1"> <?php echo $turma->getEnsino(); ?></td>
                <td colspan="1"> <?php echo $turma->getTurma(); ?></td>
                <td colspan="2">
                    <?php echo "<a href='/tabela/turma/edit?id=" .  $turma->getId() . "'><img src='/images/update.png' style='height: 35px; width: 35px;'>
                            </img></a>"; ?>
                    <?php echo "<a href='/tabela/turma/delete?id=" . $turma->getId() . "'><img src='/images/delete.png' style='height: 30px; width: 30px;'>
                            </img></a>"; ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php require __DIR__ . "/../share/footer.php"; ?>