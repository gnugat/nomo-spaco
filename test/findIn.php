<?php

require __DIR__.'/../vendor/autoload.php';

$script = $argv[0];
if (2 !== $argc) {
    die("Usage: 'php $script <projectRoot>'\n");
}
$projectRoot = $argv[1];
$fqcnRepository = \test\Gnugat\NomoSpaco\make_fqcn_repository();
print_r($fqcnRepository->findIn($projectRoot));
