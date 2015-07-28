<?php
/**
 * Created by PhpStorm.
 * User: dmytro.borysovskiy
 * Date: 4/23/2015
 * Time: 2:52 PM
 */
namespace lib\database;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
/**
 * Class Model
 * @package lib\database
 */
class Doctrine
{

    /**
     * @var EntityManager
     */
    private static $entityManager;

    /**
     * creating an EntityManager for working with database
     * @param $config array
     * @param $path string
     * @throws \Doctrine\ORM\ORMException
     */
    public static function createEntityManager(array $config, $path)
    {
        require_once "vendor/autoload.php";

        // Create a simple "default" Doctrine ORM configuration for Annotations
        $isDevMode = true;
        $annotationConfig = Setup::createAnnotationMetadataConfiguration(array($path), $isDevMode);

           // database configuration parameters
        $conn = array(
            'dbname' => $config['name'],
            'user' => $config['user'],
            'password' => $config['password'],
            'host' => $config['host'],
            'driver' => $config['adapter'],
        );

        // obtaining the entity manager
        self::$entityManager = EntityManager::create($conn, $annotationConfig);
    }

    /**
     * getting an EntityManager
     * @return mixed
     */
    public static function getEntityManager()
    {
        return self::$entityManager;
    }

} 