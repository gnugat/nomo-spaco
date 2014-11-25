<?php

namespace test\Gnugat\NomoSpaco;

use Gnugat\NomoSpaco\File\FileRepository;
use Gnugat\NomoSpaco\FqcnRepository;

class Container
{
    /**
     * @return FqcnRepository
     */
    public function get()
    {
        $fileRepository = new FileRepository();

        return new FqcnRepository($fileRepository);
    }
}
