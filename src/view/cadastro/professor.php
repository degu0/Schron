<title>Schron - Cadastro de Professor</title>
<?php require __DIR__ . "/../share/head.php"; ?><br>
<link rel="stylesheet" href="/librares/css/cadastro.css">
<div>
    <a href="/construct"><img src="/./images/sairv.png" alt=""></a>
</div>
<section class="area_login">
    <div class="login">
        <form action="/cadastro/professor/add" method="POST">
            <table>
                <tr>
                    <h1 class="Schron"><b>Cadastro de professor</b></h1>
                    <td>
                        <div class="professor">
                            <div>
                                <!-- Cadastro do nome do professor -->
                                <label>Nome:</label><br>
                                <input type="text" name="Nome" id="Nome" required class="text" placeholder="Nome do professor">
                            </div>
                            <div>
                                <!-- Guarde a string (char) da cor e use as fucntions ColorToString e StringToColor para converter. -->
                                <label>Cor do professor:</label><br>
                                <input type="color" name="cor_prof" id="cor_prof"  value="#413DBB" required class="color">
                            </div>
                            <div>
                                <!-- Cadastro da carga horaria do professor -->
                                <label>Carga:</label><br>
                                <input type="number" name="Carga" id="Carga" required class="text" placeholder="Quantidade de aulas que professor terá por semana">
                            </div><br>

                            <div>
                                <label>Dias:</label><br>
                                <input type="checkbox" name="ckDia[]" id="1" value="1">
                                <label>Segunda</label><br>
                                <input type="checkbox" name="ckDia[]" id="2" value="2">
                                <label>Terça</label><br>
                                <input type="checkbox" name="ckDia[]" id="3" value="3">
                                <label>Quarta</label><br>
                                <input type="checkbox" name="ckDia[]" id="4" value="4">
                                <label>Quinta</label><br>
                                <input type="checkbox" name="ckDia[]" id="5" value="5">
                                <label>Sexta</label><br>
                            </div><br>
                            <button class="button"><img src="/./images/sair.png"></button>
                        </div>
                    </td>
                    <td>
                    <img src="/./images/professor.png" alt="" style='width: 315px; height: 270px;'>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    </form>
    <?php require __DIR__ . "/../share/footer.php"; ?>