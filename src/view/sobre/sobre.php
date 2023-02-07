<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@200&family=Raleway:wght@100&family=Roboto+Mono:wght@200&family=Roboto:wght@300&display=swap');

    .img {
        width: 180px;
        height: 188px;
        border-radius: 10px;
    }

    .img2 {
        width: 650px;
        height: 250px;
        background: #aaa;
        border-radius: 10px;
    }

    h2 {
        font-family: 'Raleway', sans-serif;
    }

    h5,
    p {
        font-family: 'Roboto', sans-serif;
    }
</style>
<title>Schron - Sobre</title>
<?php require __DIR__ . "/../share/head.php"; ?>
<div class="container mt-7">
    <div class="row">
        <div class="col-sm-3">
            <h2><b>Sobre nós:</b></h2>
            <h5>Desenvolvedores:</h5>
            <img src="/images/ig2.jpeg" alt="" class="img">
            <p>Iris Gabriella - Líder</p>
            <img src="/images/dg.jpeg" alt="" class="img">
            <p>Deyvid Gustavo - Programador</p>
            <img src="/images/th.jpg" alt="" class="img">
            <p>Thiago Henrique - Designer</p>
            <div>
                <img src="/images/lr.jpeg" alt="" class="img">
            </div>
            <p>Lucas Roberto - Escritor</p>
            <img src="/images/gl.jpeg" alt="" class="img">
            <p style="margin-bottom:40px">Gabryel Leal - Programador</p>
            <p>Estudantes da Escola Técnica Estadual Ministro Fernando Lyra</p>
        </div>
        <div class="col-sm-8">
            <h2><b>Processo de Produção:</b></h2>
            <h5><b>Desenvolvimento do código</b></h5>
            <img src="/images/deyvidCodificando.jpeg" alt="" class="img2">
            <p>Estrutura do código em PHP para o site Schron - 
                Desenvolvimento de Ferramenta para criação <br> de horários escolares e/ou acadêmicos.</p>

            <h5 class="mt-4"><b>Equipe do Schron</b></h5>
            <img src="/images/equipeSchron.jpeg" alt="" style=" width: 650px; height: 650px; background: #aaa; border-radius: 10px;">
            <p>Imagem da equipe Schron, sendo esta constituída por uma líder e escritora,
                outro escritor, um <br> designer e dois desenvolvedores.</p>
            <!-- <h5 class="mt-4"><b>Finalização</b></h5>
            <img src="/images/dg.jpeg" alt="" class="img2">
            <p>Apresentação do Trabalho de Conclusão de Curso para a banca examinadora, o professor <br> Matheus Farias e o Mestre Professor Jeremias (sobrenome do Jere).</p> -->
        </div>
    </div>
</div>

<?php require __DIR__ . "/../share/footer.php"; ?>