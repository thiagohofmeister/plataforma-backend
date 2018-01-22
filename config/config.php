<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

return [
    EntityManager::class => function (\Interop\Container\ContainerInterface $container) {
        $config = Setup::createAnnotationMetadataConfiguration(
            ['app/src/Entity'],
            true,
            null,
            null,
            false
        );
        $connectionParams = [
            'dbname' => 'plataforma',
            'user' => 'plataforma',
            'password' => 'platform',
            'host' => '192.168.0.101',
            'driver' => 'pdo_mysql',
        ];

        $connectionParams = [
            'dbname' => 'magodaweb',
            'user' => 'magodaweb',
            'password' => 'hof120540',
            'host' => 'mysql.magodaweb.com.br',
            'driver' => 'pdo_mysql',
        ];

        return EntityManager::create($connectionParams, $config);
    },
    //'database.app' => ConsoleRunner::createHelperSet($em),
    'settings.displayErrorDetails' => true
];



/**
 <?php

use Interop\Container\ContainerInterface;

return [
    MongoDB\Database::class => function (ContainerInterface $container) {
        return (new MongoDB\Client(getenv('MONGO_URI')))
            ->selectDatabase(getenv('MONGO_DATABASE'));
    },

    'database.app' => function (ContainerInterface $container) {
        return (new MongoDB\Client(getenv('MONGO_APP_URI')))
            ->selectDatabase(getenv('MONGO_DATABASE'));
    },

    'settings.displayErrorDetails' => true,
];*/
