<h1 align = "center">Schron</h1>
<p align = "center">
<img src="http://img.shields.io/static/v1?label=License&message=MIT&color=green&style=for-the-badge"/>
</p>
  
![Comece_agora2 (6)](https://user-images.githubusercontent.com/87346972/217118662-a5600b20-9ece-4b3a-9c21-a5603c5c294b.png)

> 🛑 EM FINALIZAÇÃO 🛑

Projeto desenvolvido para o TCC na Escola Tecnica Estadual Ministro Fernando Lyra. Schron eh uma ferramenta para auxiliar na formação de grades de horários para as aulas de instituições de ensino. 

O sistema permitiria na facilitação e agilização de grades horarias de escolas, de qualquer ensino. Possibilitando gestores das escolas concluirem de forma rapida e eficiente os horários.

## 🔨 Funcionalidades do projeto

* `Funcionalidade 1` : Criar uma seleção e distribuição correta de horários de ensino para cada professor;
  <!--Giphy da tela de entrada-->
 * `Funcionalidade 2` : Sistema de login;
  <!--Giphy do sistema de login funiconando e de cadastro-->
* `Funcionalidade 3` : Evitar a duplicidade de mesmas aulas para diferentes turmas com o mesmo professor, desse modo a obstar aulas perdidas/vagas;
  <!--Giphy do sistema de cadastros-->
* `Funcionalidade 4` : Facilitar o desenvolvimento de novas grades, seja para dias distintos ou para melhor aproveitamento dos educadores.
  <!--Giphy do sistema de horário funcionando-->
  
 ## ✔️ Técnicas e tecnologias utilizadas
 
 * `PHP`;
 * `HTML, CSS e JavaScript`;
 * `MVC`;
 * `Composer`
 * `Matrizes`;

## Como rodar a aplicação

Primeiramente, antes de baixar o arquivo. Baixe o (composer) no seu computador.

No terminal do git use o comando clone para baixar o projeto: 

```
git clone https://github.com/degu0/Schron.git
```

Quando estiver com o arquivo baixado, abrira com seu editor de codigo e va para o terminal. E executara: 

```
composer install
```

E logo depois:

```
composer update
```

## Inciando com o Banco de Dados

Para rodar o banco de dados do projeto, tera que coloca-lo no seu MySQL Worbench. Logo depois, ira para o arquivo Schron/src/model/BD/conexao.php.
E la mudara para a suas informacoes: 
* Hostname;
* Username;
* Senha;
* Database.

Ex:
```
private $endereco = "127.0.0.1";
private $login = "root";
private $senha = "root";
private $banco = "exemplo";
```

Assim tera o acesso do banco de dados para a ferramenta

## Como rodar os testes

Quando efetuar os comando com o composer, criara um servidor web com php. No seu terminal ainda, efetue o comando:

```
php -S localhost:8080 -t public
```

Agora no explorador de escolha coloque barra de pesquisa o localização do servidor web

```
localhost:8080
```

## Autores

<!--Fotos dos Autores (Thiago, Iris e eu(Deyvid)) e 'links' para seus linkeId-->

## Licença

The [MIT License]() (MIT)

Copyright :copyright: 2022 - Schron
