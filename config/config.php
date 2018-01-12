<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Setup;

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
    'host' => 'localhost:3306',
    'driver' => 'pdo_mysql',
];

$em = EntityManager::create($connectionParams, $config);

return $em;

return [ConsoleRunner::createHelperSet($em)];



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
