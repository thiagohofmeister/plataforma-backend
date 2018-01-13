<?php

namespace App\Service;

use App\Contract;
use App\Entity\Post as Entity;
use Slim\Http\Request;

/**
 * @todo Document class Post.
 *
 * @author Thiago Hofmeister <thiago.souza@moovin.com.br>
 */
class Post extends Contract\Service
{
    /**
     * @inheritDoc
     */
    public function get(array $parameters)
    {
        return $this->moduleRepository->get($parameters);
    }
}