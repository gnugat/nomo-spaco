<?php

namespace Gnugat\NomoSpaco\File;

class File
{
    /**
     * @var string
     */
    private $filename;

    /**
     * @var array
     */
    private $lines = array();

    /**
     * @param string $filename
     */
    public function __construct($filename)
    {
        $this->filename = $filename;
        $this->lines = file($filename);
    }

    /**
     * @return string
     */
    public function getNamespace()
    {
        $linesFound = preg_grep('/^namespace /', $this->lines);
        $line = array_shift($linesFound);
        $match = array();
        preg_match('/^namespace (.*);/', $line, $match);

        return array_pop($match);
    }

    /**
     * @return string
     */
    public function getClassname()
    {
        $parts = explode('/', $this->filename);
        $filename = array_pop($parts);
        $parts = explode('.', $filename);

        return array_shift($parts);
    }
}
