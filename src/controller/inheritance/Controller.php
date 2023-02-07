<?php

namespace Schron\controller\inheritance;

use Nyholm\Psr7\Response;

class Controller
{
    public function getHTTPBodyBuffer(String $viewPath, array $datas = [])
    {
        ob_start();
        extract($datas);
        require __DIR__ . '/../../view' . $viewPath;
        $bodyHTTP = ob_get_clean();
        return $bodyHTTP;
    }
    public function validateCredentials(array $credentials)
    {
        if (!array_key_exists("creadential", $_SESSION)) {
            return new Response(302, ["Location" => "/login"],);
        } else if (!in_array($_SESSION["creadential"], $credentials)) {
            return new Response(302, ["Location" => "/erro/aceeso_negado"],);
        }
        return null;
    }
}
