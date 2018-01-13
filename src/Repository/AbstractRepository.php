<?php

namespace App\Repository;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

/**
 * Abstração dos repositórios.
 *
 * @author Thiago Hofmeister <thiago.hofmeister@gmail.com>
 */
abstract class AbstractRepository
{
    /** @var EntityManager */
    private $database;

    /** @var EntityRepository */
    protected $table;

    /**
     * @param EntityManager $database
     */
    public function __construct(EntityManager $database)
    {
        $this->database = $database;

        $this->table = $this->database->getRepository('App\\Entity\\' . $this->getTableName());
    }

    /**
     * Retorna o nome da coleção do relacionada a repository.
     *
     * @return string
     */
    protected function getTableName(): string
    {
        return str_replace('\\', '_', str_replace('Repository\\', '', strstr(static::class, 'Repository')));
    }
}
