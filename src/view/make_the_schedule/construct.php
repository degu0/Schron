<title>Schron - Construct horário</title>
<!-- Se já ter feito o cadastro, vai só mostrar os dados -->
<link rel="stylesheet" href="/librares/css/construct.css">
<?php require __DIR__ . "/../share/head.php"; ?>
<script>
    function exibirAlerta(mensagem) {
        alert("SIGA OS PASSOS!! Você não cadastrou " + mensagem + ", vá para lá e cadastre corretamente")
    }
</script>
<div>
    <a href="/home"><img src="/./images/sairv.png" alt="" width="55" height="55"></a>
    <p class="p">Contrução do horário</p>
</div>
<div style="display: flex; justify-content: center; margin-top: 25px;">
    <div class="dropdown">
        <button class="dropbtn"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-clipboard-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M10 1.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1Zm-5 0A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5v1A1.5 1.5 0 0 1 9.5 4h-3A1.5 1.5 0 0 1 5 2.5v-1Zm-2 0h1v1A2.5 2.5 0 0 0 6.5 5h3A2.5 2.5 0 0 0 12 2.5v-1h1a2 2 0 0 1 2 2V14a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3.5a2 2 0 0 1 2-2Z" />
            </svg><br>Ensino<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill">Passo 1</span></button>
        <div class="dropdown-content">
            <?php
            if ($booleanoEnsino == null) {
            ?>
                <a href="/cadastro/ensino">Cadastrar</a>
            <?php
            }
            ?>
            <a href="/tabela/ensino">Tabela</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
            </svg><br>Turma<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill">Passo 2</span></button>
        <div class="dropdown-content">
            <?php if ($booleanoEnsino != null) { ?>
                <?php
                if ($booleanoTurma == null) {
                ?>
                    <a href="/cadastro/turma">Cadastrar</a>
                <?php
                }
                ?>
                <a href="/tabela/turma">Tabela</a>
            <?php } else { ?>
                <p class="erro">Siga os passos! <br>Cadastre o campo Ensino</p>
            <?php } ?>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
                <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z" />
                <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z" />
            </svg><br>Professor<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill">Passo 3</span></button>
        <div class="dropdown-content">
            <?php if ($booleanoTurma != null) { ?>
                <?php
                if ($booleanoProfessor == null) {
                ?>
                    <a href="/cadastro/professor">Cadastrar</a>
                <?php
                }
                ?>
                <a href="/tabela/professor">Tabela</a>
            <?php } else { ?>
                <p class="erro">Siga os passos! <br>Cadastre o campo Turma</p>
            <?php } ?>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
            </svg><br>Disciplina<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill">Passo 4</span></button>
        <div class="dropdown-content">
            <?php if ($booleanoTurma != null) { ?>
                <?php
                if ($booleanoDisciplina == null) {
                ?>
                    <a href="/cadastro/disciplina">Cadastrar</a>
                <?php
                }
                ?>
                <a href="/tabela/disciplina">Tabela</a>
            <?php } else { ?>
                <p class="erro">Siga os passos! <br>Cadastre o campo Professor</p>
            <?php } ?>
        </div>
    </div>
    <div class="dropdown">
        <a href="/horario" style="color: #F2F5F9; text-decoration: none;">
            <button class="dropbtn">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
                    <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" />
                    <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                </svg><br>Horario<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill">Passo 5</span>
            </button>
        </a>
    </div>
</div>
<?php require __DIR__ . "/../share/footer.php"; ?>