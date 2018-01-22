<?php

namespace App\Service;

use App\Contract;
use App\Enum\HttpStatusCode;
use App\Service\Base;

/**
 * Servico relacionado as postagens.
 *
 * @author Thiago Hofmeister <thiago.souza@moovin.com.br>
 */
class Post extends Contract\Service
{
    /**
     * @inheritDoc
     *
     * @return Base\Response
     */
    public function get(array $parameters)
    {
        $posts = $this->moduleRepository->getAll();
        if (!empty($posts)) {
            return Base\Response::create([
                'total' => count($posts),
                'posts' => $posts
            ], HttpStatusCode::OK());
        }

        return Base\Response::create(['message' => 'Nenhuma postagem encontrada.'], HttpStatusCode::OK());
    }
}
