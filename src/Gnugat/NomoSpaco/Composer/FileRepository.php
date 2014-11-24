<?php

namespace Gnugat\NomoSpaco\Composer;

use Symfony\Component\Finder\Finder;

class FileRepository
{
    /**
     * @param array $paths
     *
     * @return array
     */
    public function findPhp(array $namespaces)
    {
        $finder = Finder::create()->files()->name('*.php');
        foreach ($namespaces as $paths) {
            foreach ($paths as $path) {
                $finder->in($path);
            }
        }
        $files = array();
        foreach ($finder as $file) {
            $files[] = new File($file->getRealpath());
        }

        return $files;
    }
}
