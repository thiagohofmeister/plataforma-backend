<?php

namespace App\Entity;

use Doctrine\ORM\EntityManager;

/**
 * @todo Document class AbstractEntity.
 *
 * @author Thiago Hofmeister <thiago.souza@moovin.com.br>
 */
abstract class AbstractEntity
{
    /**
     * Get array copy of object
     *
     * @return array
     */
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}