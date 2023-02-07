<?php

namespace Schron\controller;

use Schron\controller\inheritance\Controller;

use Schron\model\BD\EnsinoBD;
use Schron\model\BD\TurmaBD;
use Schron\model\BD\ProfessorBD;
use Schron\model\BD\DisciplinaBD;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ConstructController extends Controller implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $ensinoBD = new EnsinoBD();
        $turmaBD = new TurmaBD();
        $professorBD = new ProfessorBD();
        $disciplinaBD = new DisciplinaBD();
        
        $booleanoEnsino = $ensinoBD->getBooleano();
        $booleanoTurma = $turmaBD->getBooleano();
        $booleanoProfessor = $professorBD->getBooleano();
        $booleanoDisciplina = $disciplinaBD->getBooleano();

        $bodyHTTP = $this->getHTTPBodyBuffer("/make_the_schedule/construct.php", ["booleanoEnsino" => $booleanoEnsino, "booleanoTurma" => $booleanoTurma, "booleanoProfessor" => $booleanoProfessor, "booleanoDisciplina" => $booleanoDisciplina]);
        $response = new Response(200, [], $bodyHTTP);
        return $response;
    }
}
