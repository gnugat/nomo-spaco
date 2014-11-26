<?php

namespace Gnugat\NomoSpaco\File;

use Symfony\Component\Finder\Finder;

class FileRepository
{
    /**
     * @param string $path
     *
     * @return array
     */
    public function findPhp($path)
    {
        $finderFiles = Finder::create()
            ->files()
            ->in($path)
            ->name('*.php')
        ;
        $files = array();
        foreach ($finderFiles as $finderFile) {
            $files[] = new File($finderFile->getRealpath());
        }

        return $files;
    }
}
