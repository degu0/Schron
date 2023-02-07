<?php

require __DIR__ . "/../vendor/autoload.php";

use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;
use Psr\Http\Message\ResponseInterface;
use Schron\controller\ErroController;

session_start();

if ($_SESSION == null) {
    $requestRoute = array_key_exists("PATH_INFO", $_SERVER) ? $_SERVER["PATH_INFO"] : "/";
    $routes = require_once __DIR__ . "/../config/routes.php";
} else {
    $requestRoute = array_key_exists("PATH_INFO", $_SERVER) ? $_SERVER["PATH_INFO"] : "/home";
    $routes = require_once __DIR__ . "/../config/routes.php";
}

$psr17Factory = new Psr17Factory();

$creator = new ServerRequestCreator(
    $psr17Factory, // ServerRequestFactory
    $psr17Factory, // UriFactory
    $psr17Factory, // UploadedFileFactory
    $psr17Factory  // StreamFactory
);

$serverRequest = $creator->fromGlobals();


if (array_key_exists($requestRoute, $routes)) {
    $controller = new $routes[$requestRoute];
    $response = $controller->handle($serverRequest);
    sendResponse($response);
} else {
    $controller = new ErroController();
    $response = $controller->handle($serverRequest);
    sendResponse($response);
}

function sendResponse(ResponseInterface $response)
{
    foreach ($response->getHeaders() as $name => $values) {
        foreach ($values as $value) {
            header(sprintf('%s: %s', $name, $value), false);
        }
    }

    //laminas-httphandlerrunner
    $reasonPhrase = $response->getReasonPhrase();
    $statusCode   = $response->getStatusCode();

    header(sprintf(
        'HTTP/%s %d%s',
        $response->getProtocolVersion(),
        $statusCode,
        $reasonPhrase ? ' ' . $reasonPhrase : ''
    ), true, $statusCode);

    echo $response->getBody();
}
