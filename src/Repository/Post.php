<?php

namespace App\Repository;

/**
 * Repositório de operações de banco da tabela de posts.
 *
 * @author Thiago Hofmeister <thiago.hofmeister@gmail.com>
 */
class Post extends AbstractRepository
{
    /**
     * Retorna lista com todas postagens.
     *
     * @param int $limit
     * @param int $offset
     *
     * @return array
     */
    public function getAll($limit, $offset): array
    {
        $posts = [];
        /** @var \App\Entity\Post $item */
        foreach ($this->table->findBy([], [], $limit, $offset) as $item) {

            $posts[] = $item->toArray();
        }

        return $posts;
    }
}
