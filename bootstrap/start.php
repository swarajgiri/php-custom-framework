<?php

declare(strict_types=1);

require_once __DIR__.'/../vendor/autoload.php';

$builder = new \DI\ContainerBuilder();

// TO-DO
// decide on prod cache
// do we even need one, apart from the current in memory cache?
$builder->setDefinitionCache(new Doctrine\Common\Cache\ArrayCache());
// TO-DO

$builder->addDefinitions(__DIR__.'/dependencies.php');

// ioc container
$container = $builder->build();

$scormProcessor = $container->get('App\Processor\ScormProcessor');
$scormProcessor->process();
