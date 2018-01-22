<?php

namespace App\Controller;

use App\Core\Controller;
use App\Service;

/**
 * Controller da plataforma.
 *
 * @author Thiago Hofmeister <thiago.souza@moovin.com.br>
 */
class Platform extends Controller
{
    /**
     * @var Service\Base\Caller
     * @Inject
     */
    private $moduleCaller;

    /**
     * @param string $methodName
     *
     * @param array[] $parameters
     * @return mixed
     *
     * @throws \App\Encoder\Exception\Utf8Exception
     */
    public function api(string $methodName, ...$parameters)
    {
        $response = $this->moduleCaller->action($methodName, $parameters);

        return $this->renderResponse($response->getData(), $response->getStatusCode());
    }
}