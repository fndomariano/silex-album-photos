<?php

use Silex\Application;
use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;
use Doctrine\Common\Cache\ApcCache as Cache;
use Doctrine\Common\Collections\ArrayCollection;
use Dflydev\Provider\DoctrineOrm\DoctrineOrmServiceProvider;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpFoundation\Session\Session;

require_once __DIR__.'/bootstrap.php';

$app = new Application();

$app->register(new TwigServiceProvider, array(
    'twig.path' => __DIR__.'/src/AlbumPhotos/View'
));

//configuração do DBAL
$app->register(new DoctrineServiceProvider, array(
    'db.options' => array(
        'driver' => 'pdo_mysql',
        'host' => getenv('DB_HOST'),
        'user' => getenv('DB_USER'),
        'password' => getenv('DB_PASS'),
        'dbname' => getenv('DB_NAME')
    )
));


//configuração do ORM
$app->register(new Dflydev\Silex\Provider\DoctrineOrm\DoctrineOrmServiceProvider, array(
    'orm.proxies_dir' => '/tmp',
    'orm.em.options' => array(
        'mappings' => array(
            array(
                'type' => 'annotation',
                'use_simple_annotation_reader' => false,
                'namespace' => 'AlbumPhotos\Model',
                'path' => __DIR__ . '/src'
            )
        )
    ),
    'orm.proxies_namespace' => 'EntityProxy',
    'orm.auto_generate_proxies' => true,
    //'orm.default_cache' => 'apc'
));

//Session
$session = new Session();
$session->start();
$app['session'] = $session; 

//Rotas
require_once __DIR__.'/src/AlbumPhotos/Routes/routes.php';

$app['debug'] = getenv('DEBUG');
$app->run();