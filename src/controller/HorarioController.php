<?php

namespace Schron\controller;

use Schron\controller\inheritance\Controller;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Schron\model\BD\EnsinoBD;
use Schron\model\BD\TurmaBD;
use Nyholm\Psr7\Response;
use Schron\model\BD\DisciplinaBD;
use Schron\model\Horario;

class HorarioController extends Controller implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {

        $path_info = $request->getServerParams()["PATH_INFO"];
        $response = null;

        if (strpos($path_info, "segunda")) {
            $response = $this->segunda($request);
            if (strpos($path_info, "add")) {
                $response = $this->addSegunda($request);
            } else if (strpos($path_info, "tabela")) {
                $response = $this->tabelaSegunda($request);
            }
        } else if (strpos($path_info, "terca")) {
            $response = $this->terca();
            if (strpos($path_info, "add")) {
                $response = $this->addTerca($request);
            } else if (strpos($path_info, "tabela")) {
                $response = $this->tabelaTerca($request);
            }
        } else if (strpos($path_info, "quarta")) {
            $response = $this->quarta();
            if (strpos($path_info, "add")) {
                $response = $this->addQuarta($request);
            } else if (strpos($path_info, "tabela")) {
                $response = $this->tabelaQuarta($request);
            }
        } else if (strpos($path_info, "quinta")) {
            $response = $this->quinta();
            if (strpos($path_info, "add")) {
                $response = $this->addQuinta($request);
            } else if (strpos($path_info, "tabela")) {
                $response = $this->tabelaQuinta($request);
            }
        } else if (strpos($path_info, "sexta")) {
            $response = $this->sexta();
            if (strpos($path_info, "add")) {
                $response = $this->addSexta($request);
            } else if (strpos($path_info, "tabela")) {
                $response = $this->tabelaSexta($request);
            }
        } else {
            $response = $this->index();
        }
        return $response;
    }
    public function index(): ResponseInterface
    {
        $bodyHttp = $this->getHTTPBodyBuffer("/horario/horario.php");
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }

//Segunda
    public function segunda(): ResponseInterface
    {
        $disciplinaBD = new DisciplinaBD();
        $ensinoBD = new EnsinoBD();
        $turmaBD = new TurmaBD();

        $listaDisciplinaProfessor = $disciplinaBD->getSegunda();
        $listaTurma = $turmaBD->getListaComplet();
        $listaEnsino = $ensinoBD->getLista();
        $bodyHttp = $this->getHTTPBodyBuffer("/horario/cadastro/segunda.php", ["listaEnsino" => $listaEnsino, "listaTurma" => $listaTurma, "listaDisciplinaProfessor" => $listaDisciplinaProfessor]);
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }
    public function addSegunda(): ResponseInterface
    {
        $turmaBD = new TurmaBD();
        $quantTurmas = $turmaBD->getQuantidadeTurmas();

        $ensinoBD = new EnsinoBD();
        $quantAulas = $ensinoBD->getQuantidadeAulas();

        $lista = [];
        $listaHoras = [];

        foreach ($_POST as $key => $retorno) {
            if (!is_array($retorno)) {
                $informacoesaulaDia = explode("|", $retorno);
                $lista[] = $informacoesaulaDia;
            } else {
                foreach ($retorno as $time) {
                    $listaHoras[] = $time;
                }
            }
        }

        $horario = new Horario();
        $disciplinaBD = new DisciplinaBD();
        $tabela = $horario->verificaChoqueHorarioProfessorPorDia($lista, $quantAulas, $quantTurmas);
        if ($tabela == null) {
            $disciplinaBD->adicionarHorario($lista, $listaHoras, "Segunda", $quantTurmas, $quantAulas);
            $bodyHttp = $this->getHTTPBodyBuffer("/horario/horario.php");
            $response = new Response(200, [], $bodyHttp);
            return $response;
        } else {
            var_dump($tabela);
            // $response = new Response(302, ["Location" => "/horario/segunda", "erro" => $tabela], null);
            // return $response;
        }
    }

    public function tabelaSegunda(): ResponseInterface
    {

        $disciplinaBD = new DisciplinaBD();
        $ensinoBD = new EnsinoBD();
        $turmaBD = new TurmaBD();


        $quantTurmas = $turmaBD->getQuantidadeTurmas();
        $listaDisciplinaProfessor = $disciplinaBD->getHorarioSegunda();
        $listaTurma = $turmaBD->getListaComplet();
        $listaEnsino = $ensinoBD->getLista();
        $bodyHttp = $this->getHTTPBodyBuffer("/horario/tabela/segunda.php", ["listaEnsino" => $listaEnsino, "listaTurma" => $listaTurma, "listaDisciplinaProfessor" => $listaDisciplinaProfessor, "quantTurmas" => $quantTurmas]);
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }

//Terça

    public function terca(): ResponseInterface
    {
        $disciplinaBD = new DisciplinaBD();
        $ensinoBD = new EnsinoBD();
        $turmaBD = new TurmaBD();

        $listaDisciplinaProfessor = $disciplinaBD->getTerca();
        $listaTurma = $turmaBD->getListaComplet();
        $listaEnsino = $ensinoBD->getLista();
        $bodyHttp = $this->getHTTPBodyBuffer("/horario/cadastro/terca.php", ["listaEnsino" => $listaEnsino, "listaTurma" => $listaTurma, "listaDisciplinaProfessor" => $listaDisciplinaProfessor]);
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }

    public function addTerca(): ResponseInterface
    {
        $turmaBD = new TurmaBD();
        $quantTurmas = $turmaBD->getQuantidadeTurmas();

        $ensinoBD = new EnsinoBD();
        $quantAulas = $ensinoBD->getQuantidadeAulas();

        $lista = [];
        $listaHoras = [];

        foreach ($_POST as $key => $retorno) {
            if (!is_array($retorno)) {
                $informacoesaulaDia = explode("|", $retorno);
                $lista[] = $informacoesaulaDia;
            } else {
                foreach ($retorno as $time) {
                    $listaHoras[] = $time;
                }
            }
        }

        $horario = new Horario();
        $disciplinaBD = new DisciplinaBD();
        $tabela = $horario->verificaChoqueHorarioProfessorPorDia($lista, $quantAulas, $quantTurmas);
        if ($tabela == null) {
            $disciplinaBD->adicionarHorario($lista, $listaHoras, "Terça", $quantTurmas, $quantAulas);
            $bodyHttp = $this->getHTTPBodyBuffer("/horario/horario.php");
            $response = new Response(200, [], $bodyHttp);
            return $response;
        } else {
            var_dump($tabela);
             // $response = new Response(302, ["Location" => "/horario/terca", "erro" => $tabela], null);
            // return $response;
        }
    }

    public function tabelaTerca(): ResponseInterface
    {
        $disciplinaBD = new DisciplinaBD();
        $ensinoBD = new EnsinoBD();
        $turmaBD = new TurmaBD();

        $quantTurmas = $turmaBD->getQuantidadeTurmas();
        $listaDisciplinaProfessor = $disciplinaBD->getHorarioTerca();
        $listaTurma = $turmaBD->getListaComplet();
        $listaEnsino = $ensinoBD->getLista();
        $bodyHttp = $this->getHTTPBodyBuffer("/horario/tabela/terca.php", ["listaEnsino" => $listaEnsino, "listaTurma" => $listaTurma, "listaDisciplinaProfessor" => $listaDisciplinaProfessor, 'quantTurmas'=> $quantTurmas]);
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }

//Quarta
    public function quarta(): ResponseInterface
    {        
        $disciplinaBD = new DisciplinaBD();
        $ensinoBD = new EnsinoBD();
        $turmaBD = new TurmaBD();

        $listaDisciplinaProfessor = $disciplinaBD->getQuarta();
        $listaTurma = $turmaBD->getListaComplet();
        $listaEnsino = $ensinoBD->getLista();
        $bodyHttp = $this->getHTTPBodyBuffer("/horario/cadastro/quarta.php", ["listaEnsino" => $listaEnsino, "listaTurma" => $listaTurma, "listaDisciplinaProfessor" => $listaDisciplinaProfessor]);
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }

    public function addQuarta(): ResponseInterface
    {
        $turmaBD = new TurmaBD();
        $quantTurmas = $turmaBD->getQuantidadeTurmas();

        $ensinoBD = new EnsinoBD();
        $quantAulas = $ensinoBD->getQuantidadeAulas();

        $lista = [];
        $listaHoras = [];

        foreach ($_POST as $key => $retorno) {
            if (!is_array($retorno)) {
                $informacoesaulaDia = explode("|", $retorno);
                $lista[] = $informacoesaulaDia;
            } else {
                foreach ($retorno as $time) {
                    $listaHoras[] = $time;
                }
            }
        }

        $horario = new Horario();
        $disciplinaBD = new DisciplinaBD();
        $tabela = $horario->verificaChoqueHorarioProfessorPorDia($lista, $quantAulas, $quantTurmas);
        if ($tabela == null) {
            $disciplinaBD->adicionarHorario($lista, $listaHoras, "Quarta", $quantTurmas, $quantAulas);
            $bodyHttp = $this->getHTTPBodyBuffer("/horario/horario.php");
            $response = new Response(200, [], $bodyHttp);
            return $response;
        } else {
            var_dump($tabela);
             // $response = new Response(302, ["Location" => "/horario/quarta", "erro" => $tabela], null);
            // return $response;
        }
    }

    public function tabelaQuarta(): ResponseInterface
    {
        $disciplinaBD = new DisciplinaBD();
        $ensinoBD = new EnsinoBD();
        $turmaBD = new TurmaBD();

        $quantTurmas = $turmaBD->getQuantidadeTurmas();
        $listaDisciplinaProfessor = $disciplinaBD->getHorarioQuarta();
        $listaTurma = $turmaBD->getListaComplet();
        $listaEnsino = $ensinoBD->getLista();
        $bodyHttp = $this->getHTTPBodyBuffer("/horario/tabela/quarta.php", ["listaEnsino" => $listaEnsino, "listaTurma" => $listaTurma, "listaDisciplinaProfessor" => $listaDisciplinaProfessor, "quantTurmas" => $quantTurmas]);
        $response = new Response(200, [], $bodyHttp);
        return $response;
        $disciplinaBD = new DisciplinaBD();
        $ensinoBD = new EnsinoBD();
        $turmaBD = new TurmaBD();
        $disciplinaBD = new DisciplinaBD();
    }

//Quinta
    public function quinta(): ResponseInterface
    {
        $disciplinaBD = new DisciplinaBD();
        $ensinoBD = new EnsinoBD();
        $turmaBD = new TurmaBD();

        $listaDisciplinaProfessor = $disciplinaBD->getQuinta();
        $listaTurma = $turmaBD->getListaComplet();
        $listaEnsino = $ensinoBD->getLista();
        $bodyHttp = $this->getHTTPBodyBuffer("/horario/cadastro/quinta.php", ["listaEnsino" => $listaEnsino, "listaTurma" => $listaTurma, "listaDisciplinaProfessor" => $listaDisciplinaProfessor]);
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }

    public function addQuinta(): ResponseInterface
    {
        $turmaBD = new TurmaBD();
        $quantTurmas = $turmaBD->getQuantidadeTurmas();

        $ensinoBD = new EnsinoBD();
        $quantAulas = $ensinoBD->getQuantidadeAulas();

        $lista = [];
        $listaHoras = [];

        foreach ($_POST as $key => $retorno) {
            if (!is_array($retorno)) {
                $informacoesaulaDia = explode("|", $retorno);
                $lista[] = $informacoesaulaDia;
            } else {
                foreach ($retorno as $time) {
                    $listaHoras[] = $time;
                }
            }
        }

        $horario = new Horario();
        $disciplinaBD = new DisciplinaBD();
        $tabela = $horario->verificaChoqueHorarioProfessorPorDia($lista, $quantAulas, $quantTurmas);
        if ($tabela == null) {
            $disciplinaBD->adicionarHorario($lista, $listaHoras, "Quinta", $quantTurmas, $quantAulas);
            $bodyHttp = $this->getHTTPBodyBuffer("/horario/horario.php");
            $response = new Response(200, [], $bodyHttp);
            return $response;
        } else {
            var_dump($tabela);
                        // $response = new Response(302, ["Location" => "/horario/quinta", "erro" => $tabela], null);
            // return $response;
        }
    }

    public function tabelaQuinta(): ResponseInterface
    {
        $disciplinaBD = new DisciplinaBD();
        $ensinoBD = new EnsinoBD();
        $turmaBD = new TurmaBD();

        $quantTurmas = $turmaBD->getQuantidadeTurmas();
        $listaDisciplinaProfessor = $disciplinaBD->getHorarioQuinta();
        $listaTurma = $turmaBD->getListaComplet();
        $listaEnsino = $ensinoBD->getLista();
        $bodyHttp = $this->getHTTPBodyBuffer("/horario/tabela/quinta.php", ["listaEnsino" => $listaEnsino, "listaTurma" => $listaTurma, "listaDisciplinaProfessor" => $listaDisciplinaProfessor, "quantTurmas" => $quantTurmas]);
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }
//Sexta
    public function sexta(): ResponseInterface
    {
        $disciplinaBD = new DisciplinaBD();
        $ensinoBD = new EnsinoBD();
        $turmaBD = new TurmaBD();
         
        $listaDisciplinaProfessor = $disciplinaBD->getSexta();
        $listaTurma = $turmaBD->getListaComplet();
        $listaEnsino = $ensinoBD->getLista();
        $bodyHttp = $this->getHTTPBodyBuffer("/horario/cadastro/sexta.php", ["listaEnsino" => $listaEnsino, "listaTurma" => $listaTurma, "listaDisciplinaProfessor" => $listaDisciplinaProfessor]);
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }

    public function addSexta(): ResponseInterface
    {
        $turmaBD = new TurmaBD();
        $quantTurmas = $turmaBD->getQuantidadeTurmas();

        $ensinoBD = new EnsinoBD();
        $quantAulas = $ensinoBD->getQuantidadeAulas();

        $lista = [];
        $listaHoras = [];

        foreach ($_POST as $key => $retorno) {
            if (!is_array($retorno)) {
                $informacoesaulaDia = explode("|", $retorno);
                $lista[] = $informacoesaulaDia;
            } else {
                foreach ($retorno as $time) {
                    $listaHoras[] = $time;
                }
            }
        }

        $horario = new Horario();
        $disciplinaBD = new DisciplinaBD();
        $tabela = $horario->verificaChoqueHorarioProfessorPorDia($lista, $quantAulas, $quantTurmas);
        if ($tabela == null) {
            $disciplinaBD->adicionarHorario($lista, $listaHoras, "Sexta", $quantTurmas, $quantAulas);
            $bodyHttp = $this->getHTTPBodyBuffer("/horario/horario.php");
            $response = new Response(200, [], $bodyHttp);
            return $response;
        } else {
            var_dump($tabela);
                        // $response = new Response(302, ["Location" => "/horario/sexta", "erro" => $tabela], null);
            // return $response;
        }
    }

    public function tabelaSexta(): ResponseInterface
    {
        $disciplinaBD = new DisciplinaBD();
        $ensinoBD = new EnsinoBD();
        $turmaBD = new TurmaBD();

        $quantTurmas = $turmaBD->getQuantidadeTurmas();
        $listaDisciplinaProfessor = $disciplinaBD->getHorarioSexta();
        $listaTurma = $turmaBD->getListaComplet();
        $listaEnsino = $ensinoBD->getLista();
        $bodyHttp = $this->getHTTPBodyBuffer("/horario/tabela/sexta.php", ["listaEnsino" => $listaEnsino, "listaTurma" => $listaTurma, "listaDisciplinaProfessor" => $listaDisciplinaProfessor, "quantTurmas" => $quantTurmas]);
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }
}
