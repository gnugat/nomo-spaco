<?php

namespace test\Gnugat\NomoSpaco;

use Gnugat\NomoSpaco\File\FileRepository;
use Gnugat\NomoSpaco\FqcnRepository;
use Gnugat\NomoSpaco\Token\ParserFactory;

/**
 * @return FqcnRepository
 */
function make_fqcn_repository() {
    $fileRepository = new FileRepository();
    $parserFactory = new ParserFactory();

    return new FqcnRepository($fileRepository, $parserFactory);
}
