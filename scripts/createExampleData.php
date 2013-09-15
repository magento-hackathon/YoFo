<?php

require __DIR__ . '/../bootstrap.php';

use \Cotya\YoFo\Entity;

//return;

/** @var \Doctrine\ORM\EntityManager $entityManager */
$entityManager = $app['orm.em'];

$project = new Entity\Project();
$project->setName('Magento Fork');

$entityManager->persist($project);
$entityManager->flush();

echo "Created Project with ID " . $project->getId() . "\n";
/**/

$repositories = array(
    array( 'version'=>'1.7.2', 'type'=>'git', 'location'=>'github.com/some_url', 'description'=>"a description with\n line breaks"),
    array( 'version'=>'1.7.2', 'type'=>'git', 'location'=>'github.com/some_url2', 'description'=>"a description with\n line breaks"),
    array( 'version'=>'1.7.2', 'type'=>'git', 'location'=>'github.com/some_url3', 'description'=>"a description with\n line breaks"),
    array( 'version'=>'1.7.2', 'type'=>'git', 'location'=>'github.com/some_url4', 'description'=>"a description with\n line breaks"),
    
);

foreach( $repositories as $element){
    $repository = new Entity\Repository();
    $repository->setDescription($element['description']);
    $repository->setLocation($element['location']);
    $repository->setType($element['type']);
    $repository->setVersion($element['version']);
    $repository->addProject($project);
    $entityManager->persist($repository);
    $entityManager->flush();
}


$patches = array(
    array( 'source'=>'gwthitöhegtaweöthaio1', 'content'=>"- nothing\n+ this is\n+ a diff\n"),
    array( 'source'=>'gwthitöhegtaweöthaio2', 'content'=>"- nothing\n+ this is\n+ a diff\n"),
    array( 'source'=>'gwthitöhegtaweöthaio3', 'content'=>"- nothing\n+ this is\n+ a diff\n"),
    array( 'source'=>'gwthitöhegtaweöthaio4', 'content'=>"- nothing\n+ this is\n+ a diff\n"),
);

foreach( $patches as $element){
    $patch = new Entity\Patch();
    $patch->setContent($element['content']);
    $patch->setSource($element['source']);
    $patch->addProject($project);
    $entityManager->persist($patch);
    $entityManager->flush();
}

