<?php

namespace App\Controller;

use App\Core\Controller;
use App\Entity;
use App\Service;

/**
 * @todo Document class Api.
 *
 * @author Thiago Hofmeister <thiago.souza@moovin.com.br>
 */
class Api extends Controller
{
    /** @var Entity\Post */
    private $entity;

    /**
     * @param Entity\Post $entity
     */
    public function __construct(Entity\Post $entity)
    {
        $this->entity = $entity;
    }

    /**
     * @return mixed
     *
     * @throws \Exception
     */
    public function post()
    {
        return (new Service\Post())->action();
    }
}