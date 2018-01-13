<?php

namespace App\Contract;

use App\Repository\Post;
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
    /** @var Post */
    protected $moduleRepository;

    /** @var Request */
    protected $request;

    /**
     * @param Post $moduleRepository
     * @param Request $request
     */
    public function __construct(Post $moduleRepository, Request $request)
    {
        $this->request = $request;
        $this->moduleRepository = $moduleRepository;
    }

    /**
     * @param array[] $parameters
     *
     * @return array
     *
     * @throws \Exception
     */
    public function action(array ...$parameters)
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
     * @param array $parameters
     *
     * @throws \Exception
     */
    protected function get(array $parameters)
    {
        throw new \Exception("Method not implemented");
    }

    /**
     *
     * @param array $parameters
     *
     * @throws \Exception
     */
    protected function post(array $parameters)
    {
        throw new \Exception("Method not implemented");
    }

    /**
     *
     * @param array $parameters
     *
     * @throws \Exception
     */
    protected function put(array $parameters)
    {
        throw new \Exception("Method not implemented");
    }

    /**
     *
     * @param array $parameters
     *
     * @throws \Exception
     */
    protected function patch(array $parameters)
    {
        throw new \Exception("Method not implemented");
    }

    /**
     * @param array $parameters
     *
     * @throws \Exception
     */
    protected function delete(array $parameters)
    {
        throw new \Exception("Method not implemented");
    }
}
