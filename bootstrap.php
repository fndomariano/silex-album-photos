<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;

//AutoLoader do Composer
$loader = require __DIR__.'/vendor/autoload.php';

$dotenv = new \Dotenv\Dotenv(__DIR__, '.env');
$dotenv->load(); 

//vamos adicionar nossas classes ao AutoLoader
$loader->add('AlbumPhotos', __DIR__.'/src');
   
//se for falso usa o APC como cache, se for true usa cache em arrays
$isDevMode = getenv('DEBUG');
 
//caminho das entidades
$paths = array(__DIR__ . '/src/AlbumPhotos/Model');

// configurações do banco de dados
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'host' => getenv('DB_HOST'),
    'user'     => getenv('DB_USER'),
    'password' => getenv('DB_PASS'),
    'dbname'   => getenv('DB_NAME'),
);
 
$config = Setup::createConfiguration($isDevMode);
 
//leitor das annotations das entidades
$driver = new AnnotationDriver(new AnnotationReader(), $paths);
$config->setMetadataDriverImpl($driver);

//registra as annotations do Doctrine
AnnotationRegistry::registerFile(
    __DIR__ . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php'
);

//cria o entityManager
$entityManager = EntityManager::create($dbParams, $config);