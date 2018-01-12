<?php

namespace App\Entity;

use Doctrine\ORM\EntityManager;

/**
 * @todo Document class AbstractEntity.
 *
 * @author Thiago Hofmeister <thiago.souza@moovin.com.br>
 */
class AbstractEntity
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $entityManager = null;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }
}