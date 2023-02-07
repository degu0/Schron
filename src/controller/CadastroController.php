<?php

namespace Schron\controller;

use Schron\controller\inheritance\Controller;
use Schron\model\BD\EnsinoBD;
use Schron\model\Ensino;
use Schron\model\BD\ProfessorBD;
use Schron\model\Professor;
use Schron\model\BD\TurmaBD;
use Schron\model\Turma;
use Schron\model\BD\DisciplinaBD;
use Schron\model\Disciplina;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;


class CadastroController extends Controller implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $path_info = $request->getServerParams()["PATH_INFO"];
        $response = null;

        if (strpos($path_info, "ensino")) {
            $response = $this->ensino();
            if (strpos($path_info, "add")) {
                $response = $this->addEnsino($request);
            }
        } else if (strpos($path_info, "disciplina")) {
            $response = $this->disciplina();
            if (strpos($path_info, "add")) {
                $response = $this->addDisciplina($request);
            }
        } else if (strpos($path_info, "professor")) {
            $response = $this->professor();
            if (strpos($path_info, "add")) {
                $response = $this->addProfessor($request);
            }
        } else if (strpos($path_info, "turma")) {
            $response = $this->turma();
            if (strpos($path_info, "add")) {
                $response = $this->addTurma($request);
            }
        } else {
            $bodyHttp = $this->getHTTPBodyBuffer("/erro/erro_404.php",);
            $response = new Response(200, [], $bodyHttp);
        }
        return $response;
    }


    //Funções de Ensinos
    public function ensino(): ResponseInterface
    {
        $ensinoBD = new EnsinoBD();
        $booleanoEnsino = $ensinoBD->getBooleano();
        if ($booleanoEnsino != null) {
            return new Response(302, ["Location" => "/construct"],);
        }


        $bodyHttp = $this->getHTTPBodyBuffer("/cadastro/ensino.php");
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }
    public function addEnsino(ServerRequestInterface $request): ResponseInterface
    {
        $ensino = new Ensino(
            $request->getParsedBody()["Ensino"],
            $request->getParsedBody()["Aula"]
        );


        $ensinoBD = new EnsinoBD();
        $ensinoBD->adicionar($ensino);

        $response = new Response(302, ["Location" => "/tabela/ensino"], null);

        return $response;
    }

    //Funções dos Professores    
    public function professor(): ResponseInterface
    {
        $turmaBD = new TurmaBD();
        $listaTurma = $turmaBD->getListaComplet();

        $bodyHttp = $this->getHTTPBodyBuffer("/cadastro/professor.php", ["listaTurma" => $listaTurma]);
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }
    public function addProfessor(ServerRequestInterface $request): ResponseInterface
    {

        $professor = new Professor(
            $request->getParsedBody()["Nome"],
            $request->getParsedBody()["cor_prof"],
            $request->getParsedBody()["Carga"],
            null,
            null
        );

        $professorBD = new ProfessorBD();
        $professorBD->adicionar($professor);

        $idProfessor = $professorBD->getId();

        $professorBD->cadastrarDia($idProfessor, $_POST['ckDia']);

        $response = new Response(302, ["Location" => "/tabela/professor"], null);

        return $response;
    }

    //Funções de Turmas
    public function turma(): ResponseInterface
    {
        $ensinoBD = new EnsinoBD();
        $listaEnsino = $ensinoBD->getLista();

        $bodyHttp = $this->getHTTPBodyBuffer("/cadastro/turma.php", ["listaEnsino" => $listaEnsino]);
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }
    public function addTurma(ServerRequestInterface $request): ResponseInterface
    {

        $turma = new Turma(
            $request->getParsedBody()["Serie"],
            $request->getParsedBody()["Ensino"],
            $request->getParsedBody()["Curso"],
            $request->getParsedBody()["Turma"]
        );

        $turmaBD = new TurmaBD();
        $turmaBD->adicionar($turma);


        $response = new Response(302, ["Location" => "/tabela/turma"], null);

        return $response;
    }

    //Funções de Disciplinas
    public function disciplina(): ResponseInterface
    {
        $turmaBD = new TurmaBD();
        $listaTurma = $turmaBD->getListaComplet();
        $professorBD = new ProfessorBD();
        $listaProfessor = $professorBD->getListaProfessor();

        $bodyHttp = $this->getHTTPBodyBuffer("/cadastro/disciplina.php", ["listaTurma" => $listaTurma, "listaProfessor" => $listaProfessor]);
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }
    public function addDisciplina(ServerRequestInterface $request): ResponseInterface
    {
        $disciplina = new Disciplina(
            $request->getParsedBody()["Nome"],
            null,
            null,
            $request->getParsedBody()["Turma"],
            $request->getParsedBody()["Professor"],
            $request->getParsedBody()["Quantidade"],
            $request->getParsedBody()["Duplicidade"]
        );


        $disciplinaBD = new DisciplinaBD();
        $disciplinaBD->adicionar($disciplina);

        $response = new Response(302, ["Location" => "/tabela/disciplina"], null);

        return $response;
    }
}
