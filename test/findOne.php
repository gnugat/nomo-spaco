<?php

use Gnugat\NomoSpaco\FcqnRepository;

require __DIR__.'/../vendor/autoload.php';

$script = $argv[0];
if (3 !== $argc) {
    die("Usage: 'php $script <projectRoot> <classname>'\n");
}
$projectRoot = $argv[1];
$classname = $argv[2];
$fcqnRepository = new FcqnRepository();
var_dump($fcqnRepository->findOne($projectRoot, $classname));
