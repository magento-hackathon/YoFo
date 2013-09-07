<?php

require_once __DIR__.'/vendor/autoload.php';


$app = new Silex\Application();
$app['debug'] = true;

$app['mage'] = $app->share( function(){
    require_once __DIR__ . '/../base_magento/bootstrap.php';
    return Mage::App();
});


require_once __DIR__.'/src/services.php';

