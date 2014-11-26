<?php

namespace test\Gnugat\NomoSpaco;

use Gnugat\NomoSpaco\File\FileRepository;
use Gnugat\NomoSpaco\Fqcn\FqcnFactory;
use Gnugat\NomoSpaco\FqcnRepository;

/**
 * @return FqcnRepository
 */
function make_fqcn_repository() {
    $fileRepository = new FileRepository();
    $fqcnFactory = new FqcnFactory();

    return new FqcnRepository($fileRepository, $fqcnFactory);
}
