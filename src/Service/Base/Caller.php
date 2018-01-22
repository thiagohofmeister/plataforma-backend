<?php

namespace App\Service\Base;

use App\Enum\HttpStatusCode;
use Eloquent\Enumeration\Exception\UndefinedMemberExceptionInterface;
use Slim\Http\Request;

/**
 * Chama métodos dos recursos da plataforma.
 *
 * @author Thiago Hofmeister <thiago.souza@moovin.com.br>
 */
class Caller
{
    /** @var Request */
    private $request;

    /** @var Loader */
    private $loader;

    /**
     * @param Request $request
     * @param Loader $loader
     */
    public function __construct(Request $request, Loader $loader)
    {
        $this->request = $request;
        $this->loader = $loader;
    }

    /**
     * @param $actionName
     * @param array $parameters
     *
     * @return Response
     *
     * @throws \App\Encoder\Exception\Utf8Exception
     */
    public function action($actionName, array $parameters = []): Response
    {
        try {
            $action = $this->loader->action($actionName);

            $actionMethod = $this->request->getMethod();
            if (!method_exists($action, $actionMethod)) {

                return Response::create([
                    'message' => 'Método da action não foi encontrado'
                ], HttpStatusCode::NOT_FOUND());
            }

            return call_user_func_array([$action, $actionMethod], $parameters);

        } catch (\Exception $exception) {

            try {
                $statusCode = HttpStatusCode::memberByValue($exception->getCode());

            } catch (UndefinedMemberExceptionInterface $e) {

                $statusCode = HttpStatusCode::BAD_REQUEST();
            }

            return Response::create([
                'message' => $exception->getMessage()
            ], $statusCode);
        }
    }
}
