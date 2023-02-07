<title>Schron - Tabela Ensino</title>
<?php require __DIR__ . "/../share/head.php"; ?>
<link rel="stylesheet" href="/librares/css/table.css">
<table width="257" border="1px" class="d">
    <div>
        <a href="/construct"><img src="/./images/sairv.png" alt="" width="55" height="55"></a>
        <p class="p">Ensino</p>
    </div>
    <tbody>
        <tr class="td">
            <td>Ensino</td>
            <td>Aula</td>
            <td>Ações</td>
        </tr>
        <?php foreach ($listaEnsino as $ensino) { ?>

            <tr>
                <td> <?php echo $ensino->getEnsino(); ?></td>
                <td> <?php echo $ensino->getAula(); ?></td>
                <td>
                    <?php echo "<a href='/tabela/ensino/edit?id=" .  $ensino->getId() . "'><img src='/images/update.png' style='width: 35px; height: 35px;'>
                            </img></a>"; ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php require __DIR__ . "/../share/footer.php"; ?>