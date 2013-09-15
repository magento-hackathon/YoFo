<?php


use Dflydev\Silex\Provider\DoctrineOrm\DoctrineOrmServiceProvider;
use Silex\Provider\DoctrineServiceProvider;


$app['mage'] = $app->share( function(){
    require_once __DIR__ . '/../../base_magento/bootstrap.php';
    $mageRunCode = isset($_SERVER['MAGE_RUN_CODE']) ? $_SERVER['MAGE_RUN_CODE'] : '';
    /* Run store or run website */
    $mageRunType = isset($_SERVER['MAGE_RUN_TYPE']) ? $_SERVER['MAGE_RUN_TYPE'] : 'store';
    return Mage::App($mageRunCode, $mageRunType, $options);
});


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
                "namespace" => "Cotya\\YoFo\\Entity",
                "path" => __DIR__."/Classes/Entity",
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

/*
use Rg\Silex\Provider\Markdown\MarkdownServiceProvider;

$app->register(new MarkdownServiceProvider(), array(
        'md.path' => __DIR__ .'/relative-path-to-markdown-files-directory')
);
*/


$app->register(new Mustache\Silex\Provider\MustacheServiceProvider, array(
        'mustache.path' => __DIR__.'/resources/mustache',
        'mustache.options' => array(
            'cache' => __DIR__.'/../var/cache/mustache',
        ),
    ));

