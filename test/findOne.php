<?php

use test\Gnugat\NomoSpaco\Container;

require __DIR__.'/../vendor/autoload.php';

$script = $argv[0];
if (3 !== $argc) {
    die("Usage: 'php $script <projectRoot> <classname>'\n");
}
$projectRoot = $argv[1];
$classname = $argv[2];
$container = new Container();
$fqcnRepository = $container->get();
var_dump($fqcnRepository->findOne($projectRoot, $classname));
