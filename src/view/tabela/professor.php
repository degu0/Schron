<title>Schron - Tabela Professor</title>
<?php require __DIR__ . "/../share/head.php"; ?>
<link rel="stylesheet" href="/librares/css/table.css">
<table width="257" border="1px" class="d">
    <div>
        <a href="/construct"><img src="/./images/sairv.png" alt="" width="55" height="55"></a>
        <p class="p">Professor</p>
    </div>
    <h3><a href="/cadastro/professor" class="add"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
            </svg> <b>adicionar</b></a></h3>
    <tr class="td">
        <td>Cor</td>
        <td>Nome</td>
        <td>Carga</td>
        <td>Dia</td>
        <td>Ações</td>
    </tr>
    <tbody>
        <?php foreach ($listaProfessor->getLista() as $professor) {
        ?>
            <tr>
                <td colspan="">
                    <div style="height: 15px; background-color: <?php echo $professor->getCor(); ?>;  border-radius: 3px;"> </div>
                </td>
                <td colspan=""> <?php echo $professor->getNome(); ?></td>
                <td colspan=""> <?php echo $professor->getCarga(); ?></td>
                <td colspan=""> <?php echo $listaProfessor->getDias($professor->getId()) ?></td>
                <td colspan="">
                    <?php echo "<a href='/tabela/professor/edit?id=" .  $professor->getId() . "'><img src='/images/update.png' style='height: 35px; width: 35px;'>
                            </img></a>"; ?>
                    <?php echo "<a href='/tabela/professor/delete?id=" . $professor->getId() . "'><img src='/images/delete.png' style='height: 30px; width: 30px;'>
                            </img></a>"; ?>
                </td>
            </tr>
        <?php }
        ?>
    </tbody>
</table>
<?php require __DIR__ . "/../share/footer.php"; ?>