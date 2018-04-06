<?php

namespace App\Repository;

/**
 * Repositório de operações de banco da tabela tags de seo.
 *
 * @author Thiago Hofmeister <thiago.hofmeister@gmail.com>
 */
class TagSeo extends AbstractRepository
{
    /**
     * Retorna o seo do site.
     *
     * @return array
     */
    public function get(): array
    {
        ~rt($this->table->findOneBy([]));
    }
}
