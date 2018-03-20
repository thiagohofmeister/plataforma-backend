<?php

namespace App\Repository;

/**
 * Repositório de operações de banco da tabela de seo de páginas.
 *
 * @author Thiago Hofmeister <thiago.hofmeister@gmail.com>
 */
class Seo extends AbstractRepository
{
    /**
     * Retorna lista com todas seos.
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

    /**
     * Retorna seo filtrando por url.
     *
     * @param array $url
     *
     * @return array
     */
    public function getByUrl($url)
    {
        if (is_array($url)) {
            $url = reset($url);
        }

        $seo = $this->table->findOneBy(['url' => $url]);

        if (!empty($seo)) {
            return $seo->toArray();
        }

        return [];
    }
}
