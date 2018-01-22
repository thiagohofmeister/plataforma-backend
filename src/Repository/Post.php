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
     * @return array
     */
    public function getAll(): array
    {
        $posts = [];
        /** @var \App\Entity\Post $item */
        foreach ($this->table->findAll() as $item) {

            $posts[] = $item->toArray();
        }

        return $posts;
    }
}
