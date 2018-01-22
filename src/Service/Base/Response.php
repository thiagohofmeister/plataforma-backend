<?php

namespace App\Service\Base;

use App\Encoder\Utf8;
use App\Enum;

/**
 * Modelagem da resposta dos servicos.
 *
 * @author Thiago Hofmeister <thiago.souza@moovin.com.br>
 */
class Response
{
    /** @var array */
    private $data;

    /** @var Enum\HttpStatusCode */
    private $statusCode;

    /**
     * Cria uma resposta.
     *
     * @param array $data
     * @param Enum\HttpStatusCode $statusCode
     *
     * @return Response
     * @throws \App\Encoder\Exception\Utf8Exception
     */
    public static function create(array $data, Enum\HttpStatusCode $statusCode): Response
    {
        return (new Response)
            ->setData(Utf8::encode($data))
            ->setStatusCode($statusCode);
    }

    /**
     * Retorna a propriedade {@see Response::$data}.
     *
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * Define a propriedade {@see Response::$data}.
     *
     * @param array $data
     *
     * @return Response
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * Retorna a propriedade {@see Response::$statusCode}.
     *
     * @return Enum\HttpStatusCode
     */
    public function getStatusCode(): Enum\HttpStatusCode
    {
        return $this->statusCode;
    }

    /**
     * Define a propriedade {@see Response::$statusCode}.
     *
     * @param Enum\HttpStatusCode $statusCode
     *
     * @return Response
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }
}
