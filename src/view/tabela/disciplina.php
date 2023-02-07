<title>Schron - Tabela Disciplina</title>
<?php require __DIR__ . "/../share/head.php"; ?>
<link rel="stylesheet" href="/librares/css/table.css">
<div>
    <a href="/construct"><img src="/./images/sairv.png" alt="" width="55" height="55"></a>
    <p class="p">Disciplina</p>
</div>
<h3><a href="/cadastro/disciplina" class="add"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
        </svg> <b>adicionar</b></a></h3>
<table width="257" border="1px" class="d">


    <tbody>
        <tr class="td">
            <td>Nome</td>
            <td>Turma</td>
            <td>Professor</td>
            <td>Quantidade</td>
            <td>Duplicidade</td>
            <td>Ações</td>
        </tr>
        <?php foreach ($listaDisciplina as $Disciplina) { ?>

            <tr>
                <td> <?php echo $Disciplina->getNome(); ?></td>
                <td> <?php echo $Disciplina->getTurma(); ?></td>
                <td> <?php echo $Disciplina->getProfessor(); ?></td>
                <td> <?php echo $Disciplina->getQuantidade(); ?></td>
                <td> <?php echo $Disciplina->getDuplicidade(); ?></td>
                <td>
                    <?php echo "<a href='/tabela/disciplina/edit?id=" .  $Disciplina->getId() . "'><img src='/images/update.png' style='width: 35px; height: 35px;'>
                            </img></a>"; ?>
                    <?php echo "<a href='/tabela/disciplina/delete?id=" . $Disciplina->getId() . "'><img src='/images/delete.png' style='width: 30px; height: 30px;'>
                            </img></a>"; ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php require __DIR__ . "/../share/footer.php"; ?>