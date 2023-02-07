<title>Schron - Horarios</title>
<link rel="stylesheet" href="/librares/css/construct.css">
<?php require __DIR__ . "/../share/head.php"; ?>
<div>
    <a href="/construct"><img src="/./images/sairv.png" alt="" width="55" height="55"></a>
    <p class="p">Horário</p>
</div>
<div style="display: flex; justify-content: center">
    <div class="dropdown">
        <button class="dropbtn" >Segunda</button>
        <div class="dropdown-content">
            <a href="/horario/segunda">Cadastrar</a>
            <a href="/horario/segunda/tabela">Tabela</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn" class="button">Terça</button>
        <div class="dropdown-content">
            <a href="/horario/terca">Cadastrar</a>
            <a href="/horario/terca/tabela">Tabela</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn" class="button">Quarta</button>
        <div class="dropdown-content">
            <a href="/horario/quarta">Cadastrar</a>
            <a href="/horario/quarta/tabela">Tabela</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn" class="button">Quinta</button>
        <div class="dropdown-content">
            <a href="/horario/quinta">Cadastrar</a>
            <a href="/horario/quinta/tabela">Tabela</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn" class="button">Sexta</button>
        <div class="dropdown-content">
            <a href="/horario/sexta">Cadastrar</a>
            <a href="/horario/sexta/tabela">Tabela</a>
        </div>
    </div>
</div>
<?php require __DIR__ . "/../share/footer.php"; ?>