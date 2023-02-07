<?php

namespace Schron\controller;

use Schron\controller\inheritance\Controller;
use Schron\model\BD\UsuarioBD;
use Schron\model\BD\InstitutoBD;
use Schron\model\Usuario;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Schron\model\Instituto;

class UsuarioController extends Controller implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $path_info = $request->getServerParams()["PATH_INFO"];
        $response = null;

        if (strpos($path_info, "cadastro")) {
            $response = $this->create();
        } else if (strpos($path_info, "add")) {
            $response = $this->addUsuario($request);
        } else {
            $bodyHttp = $this->getHTTPBodyBuffer("/erro/erro_404.php",);
            $response = new Response(200, [], $bodyHttp);
        }
        return $response;
    }

    public function create(): ResponseInterface
    {
        $bodyHttp = $this->getHTTPBodyBuffer("/usuario/cadastro.php");
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }
    public function addUsuario(ServerRequestInterface $request): ResponseInterface
    {
        $login = $request->getParsedBody()["login"];
        $senha = $request->getParsedBody()["senha"];
        $confirma_senha = $request->getParsedBody()["cSenha"];
        $instituto = $request->getParsedBody()["inst"];

        if ($confirma_senha == $senha) {
            $usuario = new Usuario(
                $login,
                null,
                $senha, 
                $instituto
            );


            $usuarioBD = new UsuarioBD();
            $usuarioBD->adicionar($usuario);
            $loginUsuario = $request->getParsedBody()["login"];
            $_SESSION["usuario"] = $loginUsuario;

            $response = new Response(302, ["Location" => "/home"], null);

            return $response;
        }
        $response = new Response(302, ["Location" => "/usuario/cadastro"], null);

        return $response;
    }
}
