<?php

namespace test\Gnugat\NomoSpaco;

use Gnugat\NomoSpaco\Composer\AutoloadRepository;
use Gnugat\NomoSpaco\Composer\FileRepository;
use Gnugat\NomoSpaco\FcqnRepository;

class Container
{
    /**
     * @return FcqnRepository
     */
    public function get()
    {
        $autoloadRepository = new AutoloadRepository();
        $fileRepository = new FileRepository();

        return new FcqnRepository($autoloadRepository, $fileRepository);
    }
}
