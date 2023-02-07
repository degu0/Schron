<?php

namespace Schron\controller;

use Schron\controller\inheritance\Controller;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ErroController extends Controller implements RequestHandlerInterface
{
   public function handle(ServerRequestInterface $request): ResponseInterface
   {
      $path_info = $request->getServerParams()["PATH_INFO"];
      $response = null;

      if (strpos($path_info, "acesso_negado")) {
         $response = $this->acessoNegado();
      } else {
         $response = $this->index();
      }
      return $response;
   }
   public function index(): ResponseInterface
   {
      $bodyHTTP = $this->getHTTPBodyBuffer("/erro/erro_404.php");
      $response = new Response(404, ["Serve" => "Schron Server"], $bodyHTTP);
      return $response;
   }
   public function acessoNegado()
   {
      $bodyHTTP = $this->getHTTPBodyBuffer("/erro/acesso_negado.php");
      $response = new Response(200, [], $bodyHTTP);
      return $response;
   }
}
