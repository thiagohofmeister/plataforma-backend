<?php

define('APP', '../src');
define('CONFIG', '../config');
define('DS', '/');

use DI\Bridge\Slim\App;
use DI\ContainerBuilder;
use Slim\Http\Request;
use Slim\Http\Response;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Setup;

include_once '../vendor/autoload.php';

$app = new class() extends App {

    protected function configureContainer(ContainerBuilder $builder)
    {
        $builder->useAnnotations(true);
    }
};

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

    $config = Setup::createAnnotationMetadataConfiguration(
        ['app/src/Entity'],
        true,
        null,
        null,
        false
    );
    $connectionParams = [
        'dbname' => 'plataforma',
        'user' => 'plataforma',
        'password' => 'platform',
        'host' => 'localhost:3306',
        'driver' => 'pdo_mysql',
    ];
    $container->set(\Doctrine\ORM\EntityManager::class, EntityManager::create($connectionParams, $config));

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