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
     * @param array $parameters
     *
     * @return array
     */
    public function get(array $parameters): array
    {
        $posts = [];
        foreach ($this->table->findAll() as $item) {
            $posts[] = $item->getArrayCopy();
        }

        return $posts;
    }
}
