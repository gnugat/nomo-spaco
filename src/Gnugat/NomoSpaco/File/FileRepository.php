<?php

namespace Gnugat\NomoSpaco\File;

use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;
use RegexIterator;

class FileRepository
{
    /**
     * @param string $path
     *
     * @return array
     */
    public function findPhp($path)
    {
        $allFiles = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path));
        $phpFiles = new RegexIterator($allFiles, '/\.php$/');
        $files = array();
        foreach ($phpFiles as $phpFile) {
            $filename = $phpFile->getRealpath();
            $content = file_get_contents($filename);
            $files[] = new File($filename, $content);
        }

        return $files;
    }
}
