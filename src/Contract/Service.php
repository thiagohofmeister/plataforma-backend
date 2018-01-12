<?php

namespace App\Contract;

use DI\Container;
use Doctrine\ORM\EntityManager;
use Slim\Http\Request;

/**
 * @todo Document class Service.
 *
 * @author Thiago Hofmeister <thiago.souza@moovin.com.br>
 */
abstract class Service
{
    /** @var Container */
    private $container;

    /** @var Request */
    private $request;

    /**
     * @param Container $container
     * @param Request $request
     */
    public function __construct(Container $container, Request $request)
    {
        $this->container = $container;
        $this->request = $request;
    }

    /**
     * @param array[] $parameters
     *
     * @return mixed
     *
     * @throws \Exception
     */
    public function action(array ...$parameters): mixed
    {
        ~r($this->container->get(EntityManager::class));
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
     * @param array $parameters
     *
     * @return mixed
     *
     * @throws \Exception
     */
    protected function get(array $parameters): mixed
    {
        throw new \Exception("Method not implemented");
    }

    /**
     *
     * @param array $parameters
     *
     * @return mixed
     *
     * @throws \Exception
     */
    protected function post(array $parameters): mixed
    {
        throw new \Exception("Method not implemented");
    }

    /**
     *
     * @param array $parameters
     *
     * @return mixed
     *
     * @throws \Exception
     */
    protected function put(array $parameters): mixed
    {
        throw new \Exception("Method not implemented");
    }

    /**
     *
     * @param array $parameters
     *
     * @return mixed
     *
     * @throws \Exception
     */
    protected function patch(array $parameters): mixed
    {
        throw new \Exception("Method not implemented");
    }

    /**
     * @param array $parameters
     *
     * @return mixed
     *
     * @throws \Exception
     */
    protected function delete(array $parameters): mixed
    {
        throw new \Exception("Method not implemented");
    }
}
