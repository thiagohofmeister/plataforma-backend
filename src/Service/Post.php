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
     * @var Repository\Categoria
     * @Inject
     */
    private $categoryRepository;

    /**
     * Retorna lista de postagens da Api.
     *
     * @inheritDoc
     */
    public function get($slug = []): Base\Response
    {
        if (!empty($slug)) {

            $category = reset($this->categoryRepository->getBySlug($slug));
            if (!empty($category)) {

                $posts = $this->serviceRespository->getByCategory($category->getId());

            } else {

                $posts = $this->serviceRespository->getBySlug($slug);

            }

        } else {

            $posts = $this->serviceRespository->getAll($this->limit, $this->getOffset());

        }

        if (!empty($posts)) {

            $postsFormatted = [];
            foreach ($posts as $post) {
                $postsFormatted[] = $post->toArray();
            }

            return Base\Response::create([
                'total' => count($postsFormatted),
                'posts' => $postsFormatted
            ], HttpStatusCode::OK());
        }

        return Base\Response::create(['message' => 'Nenhuma postagem encontrada.'], HttpStatusCode::OK());
    }
}
