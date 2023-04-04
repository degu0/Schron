<h1 align = "center">Schron</h1>
<p align = "center">
<img src="http://img.shields.io/static/v1?label=License&message=MIT&color=green&style=for-the-badge"/>
<img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white">
<img src="https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white">
<img src="https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white">
<img src="https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white">
<img src="http://img.shields.io/static/v1?label=STATUS&message=CONCLUIDO&color=GREEN&style=for-the-badge"/>
</p>
  
![Comece_agora2 (6)](https://user-images.githubusercontent.com/87346972/217118662-a5600b20-9ece-4b3a-9c21-a5603c5c294b.png)

Projeto desenvolvido para o TCC na Escola Tecnica Estadual Ministro Fernando Lyra. Schron é uma ferramenta para auxiliar na formação de grades de horários para as aulas de instituições de ensino. 

O sistema permitiria na facilitação e agilização de grades horarias de escolas, de qualquer ensino. Possibilitando gestores das escolas concluírem de forma rápida e eficiente os horários.

## 🔨 Funcionalidades do projeto

* `Funcionalidade 1` : Criar uma seleção e distribuição correta de horários de ensino para cada professor;
  <div align = "center" width="500" height="300">
  <img src="https://user-images.githubusercontent.com/87346972/217944603-503158f2-45a7-45c6-9279-21bcea9b5017.gif" >
  </div>
##
* `Funcionalidade 2` : Sistema de login;
  <div align = "center" width="500" height="300">
  <img src="https://user-images.githubusercontent.com/87346972/217945986-70f8e9e0-eb8c-42f1-8bb5-d5ad50ae9ccb.gif" >
  </div>
##
* `Funcionalidade 3` : Evitar a duplicidade de mesmas aulas para diferentes turmas com o mesmo professor, desse modo a obstar aulas perdidas/vagas;
  <div align = "center" width="500" height="30">
  <img src="https://user-images.githubusercontent.com/87346972/217946760-db13e78e-8d0b-40fb-a5d1-5c9146fb4a62.gif" >
  </div>
  
 ## ✔️ Técnicas e tecnologias utilizadas
 
 * `PHP`;
 * `HTML, CSS e JavaScript`;
 * `MVC`;
 * `Composer`.

## ▶️ Como rodar a aplicação

Primeiramente, antes de baixar o arquivo. Baixe o [composer](https://www.hostinger.com.br/tutoriais/como-instalar-e-usar-o-composer) no seu computador.

No terminal do git use o comando clone para baixar o projeto: 

```
git clone https://github.com/degu0/Schron.git
```

Quando estiver com o arquivo baixado, abrira com seu editor de código e após para o terminal. E executará: 

```
composer install
```

E logo depois:

```
composer update
```

## 📚 Inciando com o Banco de Dados

Para rodar o banco de dados do projeto, tera que coloca-lo no seu MySQL Worbench. Logo depois, ira para o arquivo Schron/src/model/BD/conexao.php.
E lá mudará para a suas informações: 
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

## 💻 Como rodar os testes

Quando efetuar os comandos com o composer, criará um servidor web com php. No seu terminal ainda, efetue o comando:

```
php -S localhost:8080 -t public
```

Agora no explorador de escolha coloque barra de pesquisa a localização do servidor web:

```
localhost:8080
```

## 🧑‍💻 Autores


| Lider  | Desginer | Programador |
| ------------- | ------------- | ------------- |
| <img src='https://user-images.githubusercontent.com/87346972/217927503-2ed8cc7f-accb-4e85-9f64-9feb28dd1d3d.jpeg' width="170" height="150" >  | <img src='https://user-images.githubusercontent.com/87346972/217927619-6059ba3c-d493-456e-a3a6-95760116d289.jpg' width="150" height="150">  | <img src='https://user-images.githubusercontent.com/87346972/217927708-f2a659a3-d43e-417a-a549-c30942a122d6.jpeg' width="150" height="150">  |
| [Iris Gabriella](https://www.linkedin.com/in/iris-gabriella-alencar-de-lima-a72422213/)  | Thiago Henrique  | [Deyvid Gustavo](https://www.linkedin.com/in/deyvid-gustavo-0642a2235/)  |

## Licença

The MIT License (MIT)

Copyright :copyright: 2022 - Schron
