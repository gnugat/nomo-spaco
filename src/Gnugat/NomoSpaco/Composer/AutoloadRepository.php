<?php

namespace Gnugat\NomoSpaco\Composer;

class AutoloadRepository
{
    /**
     * @param string $projectRoot
     *
     * @return array
     */
    public function findAll($projectRoot)
    {
        $composerRoot = $projectRoot.'/vendor/composer';
        $files = array(
            $composerRoot.'/autoload_namespaces.php',
            $composerRoot.'/autoload_psr4.php',
            $composerRoot.'/autoload_psr0.php',
        );
        $map = array();
        foreach ($files as $file) {
            if (!file_exists($file)) {
                continue;
            }
            $fileMap = require $file;
            $map = array_merge($map, $fileMap);
        }

        return $map;
    }
}
