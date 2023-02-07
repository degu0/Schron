<title>Schron - Cadastro de Ensino</title>
<?php require __DIR__ . "/../share/head.php"; ?><br>
<link rel="stylesheet" href="/librares/css/cadastro.css">
<div>
    <a href="/construct"><img src="/./images/sairv.png" alt="" ></a>
</div>

<section class="area_login">
    <div class="login">
        <form action="/cadastro/ensino/add" method="POST">
            <h1 style="margin-bottom: 65px;"><b>Cadastro de Ensino</b></h1>
            <table>
                <tr>
                    <td>
                        <div class="ensino">
                            <div style="margin-bottom: 10px;">
                                <label>Ensino:</label><br>
                                <input type="text" name="Ensino" id="Ensino" required class="text" placeholder="Nível de escolaridade. Ex: Ensino Médio">
                            </div>
                            <div style="margin-bottom: 10px;">
                                <label>Aula:</label><br>
                                <input type="number" name="Aula" id="Aula" required class="text" placeholder="Quantidade de aulas por dia. Ex: 5 aulas">
                            </div>
                        </div>
                        <button class="button"><img src="/./images/sair.png"></button>
                    </td>
                    <td>
                        <img src="/./images/ensino.png" alt="" style='width: 270px; height: 270px;'>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</section>
<?php require __DIR__ . "/../share/footer.php"; ?>