<?php

define('APP', '../src');
define('CONFIG', '../config');
define('DS', '/');

use DI\Bridge\Slim\App;
use DI\ContainerBuilder;
use Slim\Http\Request;
use Slim\Http\Response;

include_once '../vendor/autoload.php';

$app = new class() extends App {

    protected function configureContainer(ContainerBuilder $builder)
    {
        $builder->useAnnotations(true)
            ->addDefinitions(CONFIG . DS . 'config.php');
    }
};

$app->add(new \App\Middleware\Header());

$app->any('/public/{path}[/{parameters:.*}]',  function (Response $response, string $path, string $parameters = '')
{
    $pathTmp = [
        '..',
        'public'
    ];
    $pathFull = implode(DS, $pathTmp) . DS . $path . DS . $parameters;
    $image = file_get_contents($pathFull);

    $finfo = @finfo_open(FILEINFO_MIME_TYPE);
    $type = finfo_file($finfo, $pathFull);
    if($image === FALSE) {
        return $response->write("test");
    }

    $response->write($image);

    return $response->withHeader('Content-Type', $type);
});

$app->any('/{controller}[/[{method}[/{parameters:.*}]]]',  function (Request $request, Response $response, \DI\Container $container, string $controller, string $method = 'index', string $parameters = '')
{
    $parameters = !empty($parameters) ? explode('/', $parameters) : [];

    $baseNamespace = '\App\Controller';

    $controllerSegments = explode('_', $controller);
    foreach ($controllerSegments as $k => $v) {
        $controllerSegments[$k] = mb_convert_case(mb_convert_case($v, MB_CASE_LOWER), MB_CASE_TITLE);
    }

    $controllerName = $baseNamespace . '\\' . implode('', $controllerSegments);

    if (!class_exists($controllerName)) {

        return $response->withJson([
            'message' => 'Controller não foi encontrada ' . $controllerName
        ], 404);
    }

    $container->set(Request::class, $request);

    $controllerObject = $container->get($controllerName)
        ->setResponse($response)
        ->setRequest($request);

    $methodSegments = explode('_', $method);
    foreach ($methodSegments as $k => $v) {
        $methodSegments[$k] = mb_convert_case(mb_convert_case($v, MB_CASE_LOWER), MB_CASE_TITLE);
    }

    $methodName = lcfirst(implode('', $methodSegments));

    if (!method_exists($controllerObject, $methodName)) {

        return $response
            ->withJson([
                'message' => 'Método da controler não foi encontrado ' . $controllerName
            ], 404);
    }

    try {
        return call_user_func_array([$controllerObject, $methodName], $parameters);

    } catch (Exception $exception) {

        return $response
            ->withJson([
                'message' => $exception->getMessage()
            ], 400);
    }
});

$app->run();