<?php

namespace App\Entity;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping as ORM;

/**
 * @todo Document class AbstractEntity.
 *
 * @author Thiago Hofmeister <thiago.souza@moovin.com.br>
 */
abstract class AbstractEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @var int $id
     */
    protected $id;

    /**
     * Get array copy of object
     *
     * @return array
     */
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

    /**
     * Retorna a propriedade {@see AbstractEntity::$id}.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Define a propriedade {@see AbstractEntity::$id}.
     *
     * @param int $id
     *
     * @return AbstractEntity
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
}