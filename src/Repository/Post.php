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
        foreach ($this->table->findBy([], ['dataPostagem' => 'desc'], $limit, $offset) as $item) {

            $posts[] = $item->toArray();
        }

        return $posts;
    }

    /**
     * Retorna postagem filtrando por slug.
     *
     * @param array $slug
     *
     * @return array
     */
    public function getBySlug($slug)
    {
        if (is_array($slug)) {
            $slug = reset($slug);
        }
        return [
            $this->table->findOneBy(['slug' => $slug])
        ];
    }

    /**
     * Retorna postagem filtrando por identificador da categoria.
     *
     * @param string $categoryId
     *
     * @return array
     */
    public function getByCategory($categoryId)
    {
        return $this->table->findBy(['categoria' => $categoryId]);
    }
}
