<?php


use Dflydev\Silex\Provider\DoctrineOrm\DoctrineOrmServiceProvider;
use Silex\Provider\DoctrineServiceProvider;

$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver'   => 'pdo_sqlite',
        'path'     => __DIR__.'/../var/app.db',
    ),
));


$app->register(new DoctrineOrmServiceProvider, array(
    "orm.proxies_dir" => __DIR__."/../var/doctrine/proxy",
    "orm.em.options" => array(
        "mappings" => array(
            // Using actual filesystem paths
            array(
                "type" => "annotation",
                "namespace" => "Cotya\\YoFo\\Entities",
                "path" => __DIR__."/Classes/Entities",
            ),
            /*
            array(
                "type" => "xml",
                "namespace" => "Bat\Entities",
                "path" => __DIR__."/src/Bat/Resources/mappings",
            ),
            */
        ),
    ),
));


