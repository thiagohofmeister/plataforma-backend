<?php

namespace App\Repository;

/**
 * Repositório de operações de banco da tabela de categorias.
 *
 * @author Thiago Hofmeister <thiago.hofmeister@gmail.com>
 */
class Categoria extends AbstractRepository
{
    /**
     * Retorna categoria filtrando por slug.
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
}
