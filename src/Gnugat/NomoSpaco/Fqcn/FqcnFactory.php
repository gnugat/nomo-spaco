<?php

namespace Gnugat\NomoSpaco\Fqcn;

class FqcnFactory
{
    /**
     * @param array $file
     *
     * @return array
     */
    public function makeFromFiles(array $files)
    {
        $fqcns = array();
        foreach ($files as $file) {
            $fqcns[] = $file->getNamespace().'\\'.$file->getClassname();
        }

        return $fqcns;
    }

    /**
     * @param array  $file
     * @param string $classname
     *
     * @return array
     */
    public function makeFromFilesFor(array $files, $classname)
    {
        $fqcns = array();
        foreach ($files as $file) {
            $fileClassname = $file->getClassname();
            if ($classname !== $fileClassname) {
                continue;
            }
            $fqcns[] = $file->getNamespace().'\\'.$fileClassname;
        }

        return $fqcns;
    }

    /**
     * @return array
     */
    public function makeFromLoaded()
    {
        return get_declared_classes();
    }

    /**
     * @param string $classname
     *
     * @return array
     */
    public function makeFromLoadedFor($classname)
    {
        $loaded = get_declared_classes();
        $fqcns = array();
        foreach ($loaded as $fqcn) {
            $parts = explode('\\', $fqcn);
            $currentClassname = array_pop($parts);
            if ($classname !== $currentClassname) {
                continue;
            }
            $fqcns[] = $fqcn;
        }

        return $fqcns;
    }
}
