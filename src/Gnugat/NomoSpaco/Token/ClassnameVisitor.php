<?php

namespace Gnugat\NomoSpaco\Token;

class ClassnameVisitor implements Visitor
{
    /**
     * @var FqcnCollection
     */
    private $fqcnCollection;

    /**
     * @param FqcnCollection $fqcnCollection
     */
    public function __construct(FqcnCollection $fqcnCollection)
    {
        $this->fqcnCollection = $fqcnCollection;
    }

    /**
     * {@inheritDoc}
     */
    public function visit(array $tokens, $index)
    {
        $index += 2; // Skip class keyword and whitespace
        $classname = $tokens[$index][1];
        $this->fqcnCollection->addClassname($classname);

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
