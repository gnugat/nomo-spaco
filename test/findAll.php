<?php

use Gnugat\NomoSpaco\FcqnRepository;

require __DIR__.'/../vendor/autoload.php';

$script = $argv[0];
if (2 !== $argc) {
    die("Usage: 'php $script <projectRoot>'\n");
}
$projectRoot = $argv[1];
$fcqnRepository = new FcqnRepository();
var_dump($fcqnRepository->findAll($projectRoot));
