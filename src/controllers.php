<?php



$app->mount('/yofo/project', require __DIR__.'/controllers/project.php');

$app->get('/yofo/speed', function () {
    $output = '';

    $output .= 'hello Silex World';
    $output .= '<br/>';


    return $output;
});

$app->get('/yofo/mage-speed', function () use ($app) {
    $output = '';


    /** @var Mage_Core_Model_App $mageApp */
    $mageApp    = $app['mage'];
    $mageStore = $mageApp->getStore();
    //Mage::setIsDeveloperMode(true);


    $output .= 'hello Magento World ('.$mageStore->getCode().')<br/>';
    $output .= '<br/>';
    $output .= 'the silex world';
    $output .= '<br/>';
    $output .= '<br/>';

    $output .= $mageStore->getFrontendName().'<br/>';
    $output .= $mageStore->getBaseCurrencyCode().'<br/>';
    $output .= $mageStore->getBaseUrl().'<br/>';


    return $output;
});


