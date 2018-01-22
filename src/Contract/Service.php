<?php

namespace App\Contract;

use App\Repository\AbstractRepository;
use App\Service\Base;
use Slim\Http\Request;

/**
 * Contrato de servicos.
 *
 * @author Thiago Hofmeister <thiago.souza@moovin.com.br>
 */
abstract class Service
{
    /** @var AbstractRepository */
    protected $serviceRespository;

    /** @var Request */
    protected $request;

    /**
     * @param AbstractRepository $serviceRespository
     * @param Request $request
     */
    public function __construct(AbstractRepository $serviceRespository, Request $request)
    {
        $this->request = $request;
        $this->serviceRespository = $serviceRespository;
    }

    /**
     * @param array[] $parameters
     *
     * @return Base\Response
     *
     * @throws \Exception
     */
    public function action(...$parameters)
    {
        if ($this->request->isGet()) {
            return $this->get($parameters);
        }

        if ($this->request->isPost()) {
            return $this->post($parameters);
        }

        if ($this->request->isPut()) {
            return $this->put($parameters);
        }

        if ($this->request->isPatch()) {
            return $this->patch($parameters);
        }

        if ($this->request->isDelete()) {
            return $this->delete($parameters);
        }
    }

    /**
     * Metodo referente a requisicao de GET.
     *
     * @param array $parameters
     *
     * @return Base\Response
     *
     * @throws \Exception
     */
    protected function get(array $parameters): Base\Response
    {
        throw new \Exception("Method not implemented");
    }

    /**
     * Metodo referente a requisicao de POST.
     *
     * @param array $parameters
     *
     * @return static|Base\Response
     *
     * @throws \Exception
     */
    protected function post(array $parameters): Base\Response
    {
        throw new \Exception("Method not implemented");
    }

    /**
     * Metodo referente a requisicao de PUT.
     *
     * @param array $parameters
     *
     * @return Base\Response
     *
     * @throws \Exception
     */
    protected function put(array $parameters): Base\Response
    {
        throw new \Exception("Method not implemented");
    }

    /**
     * Metodo referente a requisicao de PATCH.
     *
     * @param array $parameters
     *
     * @return Base\Response
     *
     * @throws \Exception
     */
    protected function patch(array $parameters): Base\Response
    {
        throw new \Exception("Method not implemented");
    }

    /**
     * Metodo referente a requisicao de DELETE.
     *
     * @param array $parameters
     *
     * @return Base\Response
     *
     * @throws \Exception
     */
    protected function delete(array $parameters): Base\Response
    {
        throw new \Exception("Method not implemented");
    }
}
