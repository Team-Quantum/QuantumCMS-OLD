<?php

namespace Quantum;

use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\ORM\Tools\Setup;

class DatabaseManager {

    /**
     * @var Configuration
     */
    private $config;

    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * DatabaseManager constructor.
     * @param $connectionSettings array Connection details
     * @param $mappingsDirectory string Path to directory where the mappings stored
     * @throws \Doctrine\ORM\ORMException
     * @throws \Exception
     */
    public function __construct($connectionSettings, $mappingsDirectory) {
        // First Step: Convert settings to doctrine params
        $connectionParams = array();
        if($connectionSettings['type'] == 'mysql') {
            $connectionParams['dbname'] = $connectionSettings['database'];
            $connectionParams['user'] = $connectionSettings['username'];
            $connectionParams['password'] = $connectionSettings['password'];
            $connectionParams['host'] = $connectionSettings['server'];
            $connectionParams['driver'] = 'pdo_mysql';
        } else if($connectionSettings['type'] == 'sqlite') {
            $connectionParams['path'] = $connectionSettings['path'];
            $connectionParams['driver'] = 'pdo_sqlite';
        } else {
            throw new \Exception("Unkown database type '" . $connectionSettings['type'] . "'");
        }

        // Second Step: Create configuration
        $this->config = Setup::createXMLMetadataConfiguration(array($mappingsDirectory), true);

        // Third Step: Create a connection (EntityManager)
        $this->entityManager = EntityManager::create($connectionParams, $this->config);
    }

    /**
     * Creates the structure into the database
     * Only works on internal database
     */
    public function createStructure() {
        $tool = new SchemaTool($this->entityManager);
        $classes = array(
            $this->entityManager->getClassMetadata('Quantum\DBO\CoreStatus'),
            $this->entityManager->getClassMetadata('Quantum\DBO\Translation'),
            $this->entityManager->getClassMetadata('Quantum\DBO\InternalAccount'),
            $this->entityManager->getClassMetadata('Quantum\DBO\Download')
        );
        $tool->updateSchema($classes);
    }

    /**
     * @return EntityManager
     */
    public function getEntityManager() {
        return $this->entityManager;
    }
}