<?php

namespace App\Service\Base;

use DI;

/**
 * Carrega recursos da plataforma.
 *
 * @author Thiago Hofmeister <thiago.souza@moovin.com.br>
 */
class Loader
{
    /** @var DI\Container */
    private $container;

    /**
     * @param DI\Container $container
     */
    public function __construct(DI\Container $container)
    {
        $this->container = $container;
    }

    /**
     * @param string $actionName
     *
     * @return mixed
     *
     * @throws DI\DependencyException
     * @throws DI\NotFoundException
     * @throws \Exception
     */
    public function action(string $actionName)
    {
        $actionPath = $this->actionPath($actionName);

        if (!class_exists($actionPath)) {
            throw new \Exception('Ação não encontrada.');
        }

        $this->injectRepository($actionName);

        return $this->container->get($actionPath);
    }

    /**
     * @param string $actionName
     *
     * @throws DI\DependencyException
     * @throws DI\NotFoundException
     * @throws \Exception
     */
    private function injectRepository(string $actionName)
    {
        $repositoryPath = $this->repositoryPath($actionName);

        if (!class_exists($repositoryPath)) {
            throw new \Exception('Repository não encontrada.');
        }

        $repository = $this->container->get($repositoryPath);

        $this->container->set(get_parent_class($repository), $repository);
    }

    /**
     * Retorna caminho da ação do módulo.
     *
     * @param string $actionName
     *
     * @return string
     *
     * @throws \Exception
     */
    private function actionPath(string $actionName): string
    {
        $actionName = implode('\\', [
            'App',
            'Service',
            $this->getStudlyCaps($actionName)
        ]);

        return $actionName;
    }

    /**
     * Retorna caminho da ação do módulo.
     *
     * @param string $actionName
     *
     * @return string
     *
     * @throws \Exception
     */
    private function repositoryPath(string $actionName): string
    {
        $actionName = implode('\\', [
            'App',
            'Repository',
            $this->getStudlyCaps($actionName)
        ]);

        return $actionName;
    }

    /**
     * Retorna string no padrão StudlyCaps.
     *
     * @param string $text
     *
     * @return string
     */
    private function getStudlyCaps(string $text): string
    {
        return str_replace(' ', '', ucwords(str_replace('_', ' ', $text)));
    }
}
