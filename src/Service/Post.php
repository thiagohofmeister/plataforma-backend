<?php

namespace App\Service;

use App\Contract;
use App\Enum\HttpStatusCode;
use App\Service\Base;
use App\Repository;

/**
 * Servico relacionado as postagens.
 *
 * @property Repository\Post $serviceRespository
 *
 * @author Thiago Hofmeister <thiago.souza@moovin.com.br>
 */
class Post extends Contract\Service
{
    /**
     * Retorna lista de postagens da Api.
     *
     * @inheritDoc
     *
     * @return Base\Response
     */
    public function get($slug = []): Base\Response
    {
        if (!empty($slug)) {

            $posts = $this->serviceRespository->getBySlug($slug);

        } else {

            $posts = $this->serviceRespository->getAll($this->limit, $this->getOffset());
        }

        if (!empty($posts)) {
            return Base\Response::create([
                'total' => count($posts),
                'posts' => $posts
            ], HttpStatusCode::OK());
        }

        return Base\Response::create(['message' => 'Nenhuma postagem encontrada.'], HttpStatusCode::OK());
    }
}
