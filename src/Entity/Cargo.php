<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="cargos")
 */
class Cargo extends AbstractEntity
{
    /**
     * @ORM\Column(type="string", length=30)
     *
     * @var string $descricao
     */
    protected $descricao;

    /**
     * @ORM\Column(type="integer", length=6)
     *
     * @var string $nivel
     */
    protected $nivel;

    /**
     * Retorna a propriedade {@see Cargo::$id}.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Define a propriedade {@see Cargo::$id}.
     *
     * @param int $id
     *
     * @return Cargo
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Retorna a propriedade {@see Cargo::$descricao}.
     *
     * @return string
     */
    public function getDescricao(): string
    {
        return $this->descricao;
    }

    /**
     * Define a propriedade {@see Cargo::$descricao}.
     *
     * @param string $descricao
     *
     * @return Cargo
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
        return $this;
    }

    /**
     * Retorna a propriedade {@see Cargo::$nivel}.
     *
     * @return string
     */
    public function getNivel(): string
    {
        return $this->nivel;
    }

    /**
     * Define a propriedade {@see Cargo::$nivel}.
     *
     * @param string $nivel
     *
     * @return Cargo
     */
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;
        return $this;
    }
}
