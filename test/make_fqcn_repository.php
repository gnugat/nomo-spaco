<?php

namespace test\Gnugat\NomoSpaco;

use Gnugat\NomoSpaco\File\FileRepository;
use Gnugat\NomoSpaco\FqcnRepository;

/**
 * @return FqcnRepository
 */
function make_fqcn_repository() {
    $fileRepository = new FileRepository();

    return new FqcnRepository($fileRepository);
}
