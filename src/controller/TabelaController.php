<?php

namespace Schron\controller;

use Schron\controller\inheritance\Controller;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Schron\model\BD\EnsinoBD;
use Schron\model\Ensino;
use Schron\model\BD\DisciplinaBD;
use Schron\model\Disciplina;
use Schron\model\BD\TurmaBD;
use Schron\model\Turma;
use Schron\model\BD\ProfessorBD;
use Schron\model\Professor;
use Schron\model\ListaProfessores;


class TabelaController extends Controller implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $path_info = $request->getServerParams()["PATH_INFO"];
        $response = null;

        if (strpos($path_info, "ensino")) {
            $response = $this->ensino();
            if (strpos($path_info, "edit")) {
                $response = $this->editEnsino($request);
            } else if (strpos($path_info, "update")) {
                $response = $this->updateEnsino($request);
            } else if (strpos($path_info, "delete")) {
                $response = $this->deleteEnsino($request);
            }
        } else if (strpos($path_info, "disciplina")) {
            $response = $this->disciplina();
            if (strpos($path_info, "edit")) {
                $response = $this->editDisciplina($request);
            } else if (strpos($path_info, "update")) {
                $response = $this->updateDisciplina($request);
            } else if (strpos($path_info, "delete")) {
                $response = $this->deleteDisciplina($request);
            }
        } else if (strpos($path_info, "turma")) {
            $response = $this->turma();
            if (strpos($path_info, "edit")) {
                $response = $this->editTurma($request);
            } else if (strpos($path_info, "update")) {
                $response = $this->updateTurma($request);
            } else if (strpos($path_info, "delete")) {
                $response = $this->deleteTurma($request);
            }
        } else if (strpos($path_info, "professor")) {
            $response = $this->professor();
            if (strpos($path_info, "edit")) {
                $response = $this->editProfessor($request);
            } else if (strpos($path_info, "update")) {
                $response = $this->updateProfessor($request);
            } else if (strpos($path_info, "delete")) {
                $response = $this->deleteProfessor($request);
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

        $listaEnsino = $ensinoBD->getLista();
        $bodyHttp = $this->getHTTPBodyBuffer("/tabela/ensino.php", ["listaEnsino" => $listaEnsino]);
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }
    public function editEnsino(ServerRequestInterface $request): ResponseInterface
    {
        $ensinoBD = new EnsinoBD();
        $ensino = $ensinoBD->getEnsino($request->getQueryParams()["id"]);
        $bodyHttp = $this->getHTTPBodyBuffer("/edit/ensino.php", ["ensino" => $ensino]);
        $response = new Response(200, [], $bodyHttp);

        return $response;
    }
    public function updateEnsino(ServerRequestInterface $request): ResponseInterface
    {

        $ensinoBD = new EnsinoBD();
        $ensino = new Ensino(
            $request->getParsedBody()["Ensino"],
            $request->getParsedBody()["Aula"],
            $request->getQueryParams()["id"]
        );

        $ensinoBD->atualizar($ensino);

        $response = new Response(302, ["Location" => "/tabela/ensino"], null);
        return $response;
    }
    public function deleteEnsino(ServerRequestInterface $request): ResponseInterface
    {
        $ensinoBD = new EnsinoBD();
        $ensinoBD->remover($request->getQueryParams()["id"]);

        $response = new Response(302, ["Location" => "/tabela/ensino"], null);
        return $response;
    }


    //Funções de Disciplinas
    public function disciplina(): ResponseInterface
    {
        $disciplinaBD = new DisciplinaBD();

        $listaDisciplina = $disciplinaBD->getLista();
        $bodyHttp = $this->getHTTPBodyBuffer("/tabela/disciplina.php", ["listaDisciplina" => $listaDisciplina]);
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }
    public function editDisciplina(ServerRequestInterface $request): ResponseInterface
    {
        $turmaBD = new TurmaBD();
        $listaTurma = $turmaBD->getListaComplet();
        $professorBD = new ProfessorBD();
        $listaProfessor = $professorBD->getListaProfessor();

        $disciplinaBD = new DisciplinaBD();
        $disciplina = $disciplinaBD->getDisciplina($request->getQueryParams()["id"]);
        $bodyHttp = $this->getHTTPBodyBuffer("/edit/Disciplina.php", ["disciplina" => $disciplina, "listaTurma" => $listaTurma, "listaProfessor" => $listaProfessor]);
        $response = new Response(200, [], $bodyHttp);

        return $response;
    }
    public function updateDisciplina(ServerRequestInterface $request): ResponseInterface
    {

        $disciplinaBD = new DisciplinaBD();
        $disciplina = new Disciplina(
            $request->getParsedBody()["Nome"],
            null,
            null,
            $request->getParsedBody()["Turma"],
            $request->getParsedBody()["Professor"],
            $request->getParsedBody()["Quantidade"],
            $request->getParsedBody()["Duplicidade"],
            $request->getQueryParams()["id"]
        );

        $disciplinaBD->atualizar($disciplina);

        $response = new Response(302, ["Location" => "/tabela/disciplina"], null);
        return $response;
    }
    public function deleteDisciplina(ServerRequestInterface $request): ResponseInterface
    {
        $disciplinaBD = new DisciplinaBD();
        $disciplinaBD->remover($request->getQueryParams()["id"]);

        $response = new Response(302, ["Location" => "/tabela/disciplina"], null);
        return $response;
    }


    //Funções de Turmas   
    public function turma(): ResponseInterface
    {
        $turmaBD = new TurmaBD();

        $listaTurma = $turmaBD->getLista();
        $bodyHttp = $this->getHTTPBodyBuffer("/tabela/turma.php", ["listaTurma" => $listaTurma]);
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }
    public function editTurma(ServerRequestInterface $request): ResponseInterface
    {
        $turmaBD = new TurmaBD();
        $turma = $turmaBD->getTurma($request->getQueryParams()["id"]);
        $ensinoBD = new EnsinoBD();
        $listaEnsino = $ensinoBD->getLista();
        $bodyHttp = $this->getHTTPBodyBuffer("/edit/turma.php", ["turma" => $turma, "listaEnsino" => $listaEnsino]);
        $response = new Response(200, [], $bodyHttp);

        return $response;
    }
    public function updateTurma(ServerRequestInterface $request): ResponseInterface
    {

        $turmaBD = new TurmaBD();
        $turma = new Turma(
            $request->getParsedBody()["Serie"],
            $request->getParsedBody()["Ensino"],
            $request->getParsedBody()["Curso"],
            $request->getParsedBody()["Turma"],
            $request->getQueryParams()["id"]
        );

        
        $turmaBD->atualizar($turma);

        $response = new Response(302, ["Location" => "/tabela/turma"], null);
        return $response;
    }
    public function deleteTurma(ServerRequestInterface $request): ResponseInterface
    {
        $turmaBD = new TurmaBD();
        $turmaBD->remover($request->getQueryParams()["id"]);

        $response = new Response(302, ["Location" => "/tabela/turma"], null);
        return $response;
    }


    //Funções de Professores
    public function professor(): ResponseInterface
    {
        $professorBD = new ProfessorBD();


        $listaProfessor = new ListaProfessores($professorBD->getLista());

        $bodyHttp = $this->getHTTPBodyBuffer("/tabela/professor.php", ["listaProfessor" => $listaProfessor]);
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }
    public function editProfessor(ServerRequestInterface $request): ResponseInterface
    {
        $professorBD = new ProfessorBD();
        $turmaBD = new TurmaBD();

        $professor = $professorBD->getProfessor($request->getQueryParams()["id"]);
        $bodyHttp = $this->getHTTPBodyBuffer("/edit/professor.php", ["professor" => $professor]);
        $response = new Response(200, [], $bodyHttp);

        return $response;
    }
    public function deleteProfessor(ServerRequestInterface $request): ResponseInterface
    {
        $professorBD = new ProfessorBD();

        $professorBD->remover($request->getQueryParams()["id"]);

        $response = new Response(302, ["Location" => "/tabela/professor"], null);
        return $response;
    }
    public function updateProfessor(ServerRequestInterface $request): ResponseInterface
    {

        $professorBD = new ProfessorBD();
        $professor = new Professor(
            $request->getParsedBody()["Nome"],
            $request->getParsedBody()["cor_prof"],
            $request->getParsedBody()["Carga"],
            null,
            null,
            $request->getQueryParams()["id"]
        );
        $professorBD->atualizar($professor);

        $response = new Response(302, ["Location" => "/tabela/professor"], null);
        return $response;
    }
}
