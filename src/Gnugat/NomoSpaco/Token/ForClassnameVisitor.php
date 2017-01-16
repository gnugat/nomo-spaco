<?php

namespace Gnugat\NomoSpaco\Token;

class ForClassnameVisitor implements Visitor
{
    /**
     * @var FqcnCollection
     */
    private $fqcnCollection;

    /**
     * @var string
     */
    private $classname;

    /**
     * @param FqcnCollection $fqcnCollection
     * @param string         $classname
     */
    public function __construct(FqcnCollection $fqcnCollection, $classname)
    {
        $this->fqcnCollection = $fqcnCollection;
        $this->classname = $classname;
    }

    /**
     * {@inheritDoc}
     */
    public function visit(array $tokens, $index)
    {
        $index += 2; // Skip class keyword and whitespace
        $classname = $tokens[$index][1];
        if ($this->classname === $classname) {
            $this->fqcnCollection->addClassname($classname);
        }

        return $index;
    }

    /**
     * {@inheritDoc}
     */
    public function supports(array $tokens, $index)
    {
        return (isset($tokens[$index][0]) && T_CLASS === $tokens[$index][0] && T_DOUBLE_COLON !== $tokens[$index - 1][0]);
    }
}
