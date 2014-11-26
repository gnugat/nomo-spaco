<?php

require __DIR__.'/../vendor/autoload.php';

$script = $argv[0];
if (3 !== $argc) {
    die("Usage: 'php $script <projectRoot> <classname>'\n");
}
$projectRoot = $argv[1];
$classname = $argv[2];
$fqcnRepository = \test\Gnugat\NomoSpaco\make_fqcn_repository();
print_r($fqcnRepository->findInFor($projectRoot, $classname));
