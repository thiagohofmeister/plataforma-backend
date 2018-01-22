<?php

namespace App\Controller;

use App\Core\Controller;
use App\Repository\Post;
use App\Service;

/**
 * @todo Document class Api.
 *
 * @author Thiago Hofmeister <thiago.souza@moovin.com.br>
 */
class Api extends Controller
{
    /** @var Post */
    private $moduleRepository;

    /** @var Service\Post */
    private $postService;

    /**
     * @param Post $moduleRepository
     * @param Service\Post $postService
     */
    public function __construct(Post $moduleRepository, Service\Post $postService)
    {
        $this->moduleRepository = $moduleRepository;
        $this->postService = $postService;
    }

    /**
     * @return mixed
     *
     * @throws \Exception
     */
    public function post()
    {
        $response = $this->postService->action();

        return $this->renderResponse($response->getData(), $response->getStatusCode());
    }
}