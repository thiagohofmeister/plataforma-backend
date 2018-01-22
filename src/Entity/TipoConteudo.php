<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Modelagem referente aos tipos de conteudo.
 *
 * @ORM\Entity
 * @ORM\Table(name="tipo_conteudos")
 */
class TipoConteudo extends AbstractEntity
{
    /**
     * @ORM\Column(type="string", length=220)
     *
     * @var string $descricao
     */
    protected $descricao;

    /**
     * @ORM\Column(type="string", length=140)
     *
     * @var string $slug
     */
    protected $slug;

    /**
     * Retorna a propriedade {@see TipoConteudo::$descricao}.
     *
     * @return string
     */
    public function getDescricao(): string
    {
        return $this->descricao;
    }

    /**
     * Define a propriedade {@see TipoConteudo::$descricao}.
     *
     * @param string $descricao
     *
     * @return TipoConteudo
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
        return $this;
    }

    /**
     * Retorna a propriedade {@see TipoConteudo::$slug}.
     *
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * Define a propriedade {@see TipoConteudo::$slug}.
     *
     * @param string $slug
     *
     * @return TipoConteudo
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }
}