 <title>Schron</title>
 <?php require __DIR__ . "/../share/head.php"; ?>
 <style>
     @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&family=Raleway:wght@200&display=swap');

     h1 {
         font-size: 70pt;
         font-family: 'Montserrat', sans-serif;
         margin-top: 43px;
         margin-left: 50px;
     }

     h3 {
         font-family: 'Raleway', sans-serif;
         margin-left: 190px;
         margin-top: 50px;
         margin-bottom: 50px;
         font-size: 26pt;
     }

     .texto {
         font-size: 25pt;
         font-family: 'Raleway', sans-serif;
         margin-left: 50px;
     }

     .img2 {
         width: 1300px;
         height: 550px;
         background: #aaa;
         margin-left: 190px;
     }

     .d {
         
         width: 87%;
         margin-top: 150px;
         margin-bottom: 150px;
         /* Valor da Largura */
     }
 </style>
 <div class="container">
     <div class="card text-bg-dark w-100 rounded-4" style="margin-top: 55px;">
         <a class="text-decoration-none text-white" href="/construct" style="text-decoration: none;">
             <img src="/images/Comece_agora2.png" class="card-img" alt="..." height="30%">
             <div class="card-img-overlay">
                 <h1 class="card-title"><b>COMEÇE <br> AGORA</b></h1>
                 <p class="texto">clique aqui para começar a <br> adicionar os dados dos <br> educadores e gerar seu <br> horário</p>
             </div>
         </a>
     </div>
 </div>
 <div class="d">
     <table class="tabela">
         <tr>
             <td>
                 <h3 style="">O Schron é uma plataforma gratuita
                     desenvolvida para a criação de horários
                     escolares e academicos, por meio de
                     uma ferramenta automática de criação
                     que ordena e condiciona as aulas em
                     seus devidos lugares, sem duplicidade
                     ou não aproveitamento dos professores.
                 </h3>
             </td>
             <td>
                 <img src="./images/relogio.png" style="align-items: right; width: 600;">
             </td>
         </tr>
     </table>
 </div>
 <?php require __DIR__ . "/../share/footer.php"; ?>