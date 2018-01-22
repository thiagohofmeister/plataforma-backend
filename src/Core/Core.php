<?php

namespace App\Core;

use Slim\Http\Request;
use Slim\Http\Response;
use App\Enum;

/**
 * Abstracao do core de controllers.
 *
 * @author Thiago Hofmeister <thiago.souza@moovin.com.br>
 */
abstract class Core
{
    /** @var Request Requisição recebida. */
    private $request;

    /** @var Response Resposta a ser retornada. */
    private $response;

    /**
     * Retorna a propriedade {@see Controller::$request}.
     *
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Define a propriedade {@see Controller::$request}.
     *
     * @param Request $request
     *
     * @return static|Controller
     */
    public function setRequest(Request $request)
    {
        $this->request = $request;

        return $this;
    }

    /**
     * Retorna a propriedade {@see Controller::$response}.
     *
     * @return Response
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Define a propriedade {@see Controller::$response}.
     *
     * @param Response $response
     *
     * @return static|Controller
     */
    public function setResponse(Response $response)
    {
        $this->response = $response;

        return $this;
    }

    /**
     * Renderiza a saída no formato json.
     *
     * @param array $data
     * @param Enum\HttpStatusCode $httpStatusCode
     *
     * @return Response
     */
    protected function renderResponse(array $data, Enum\HttpStatusCode $httpStatusCode)
    {
        return $this->response->withJson($data, $httpStatusCode->value());
    }

    /**
     * Retorna o corpo da requisição convertido para array.
     *
     * @return array Corpo da requisição.
     */
    protected function getBody()
    {
        return $this->request->getParsedBody();
    }
}