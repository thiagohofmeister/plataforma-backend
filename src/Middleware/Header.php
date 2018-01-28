<?php

namespace App\Middleware;

use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Middleware responsável por adicionar Headers ao response.
 *
 * @package App\Middleware\Response
 *
 * @author Thiago Hofmeister <thiago.souza@moovin.com.br>
 */
class Header
{
    /**
     * Adiciona headers de acesso.
     *
     * @param Request $request
     * @param Response $response
     * @param callable $next
     *
     * @return Response
     */
    public function __invoke(Request $request, Response $response, $next)
    {
        $response = $next($request, $response);

        return $response
            ->withAddedHeader('Access-Control-Allow-Origin', '*')
            ->withAddedHeader('Access-Control-Allow-Headers', 'Authorization,Content-Type');
    }
}