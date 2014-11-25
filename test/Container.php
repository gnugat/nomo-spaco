<?php

namespace test\Gnugat\NomoSpaco;

use Gnugat\NomoSpaco\Composer\AutoloadRepository;
use Gnugat\NomoSpaco\Composer\FileRepository;
use Gnugat\NomoSpaco\FqcnRepository;

class Container
{
    /**
     * @return FqcnRepository
     */
    public function get()
    {
        $autoloadRepository = new AutoloadRepository();
        $fileRepository = new FileRepository();

        return new FqcnRepository($autoloadRepository, $fileRepository);
    }
}
