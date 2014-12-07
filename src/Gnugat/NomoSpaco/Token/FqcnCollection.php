<?php

namespace Gnugat\NomoSpaco\Token;

class FqcnCollection
{
    /**
     * @var string
     */
    private $namespace;

    /**
     * @var array
     */
    private $fqcns = array();

    /**
     * @param string $namespace
     */
    public function setNamespace($namespace)
    {
        $this->namespace = $namespace;
    }

    /**
     * @param string $classname
     */
    public function addClassname($classname)
    {
        $this->fqcns[] = $this->namespace.'\\'.$classname;
    }

    /**
     * @return array
     */
    public function all()
    {
        return $this->fqcns;
    }
}
