<?php


$app->get('/yofo/speed', function () {
    $output = '';

    $output .= 'hello Silex World';
    $output .= '<br/>';


    return $output;
});

$app->get('/yofo/mage-speed', function () use ($app) {
    $output = '';

    $mageApp = $app['mage'];
    //Mage::setIsDeveloperMode(true);


    $output .= 'hello Magento World<br/>';
    $output .= '<br/>';
    $output .= 'the silex world';
    $output .= '<br/>';

    return $output;
});


