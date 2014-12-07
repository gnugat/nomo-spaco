<?php

namespace Gnugat\NomoSpaco\Token;

class NamespaceVisitor implements Visitor
{
    /**
     * @var FqcnCollection
     */
    private $fqcns;

    /**
     * @param FqcnCollection $fqcns
     */
    public function __construct(FqcnCollection $fqcns)
    {
        $this->fqcns = $fqcns;
    }

    /**
     * {@inheritDoc}
     */
    public function visit(array $tokens, $index)
    {
        $namespace = '';
        $index += 2; // Skip namespace keyword and whitespace
        while (isset($tokens[$index]) && is_array($tokens[$index])) {
            $namespace .= $tokens[$index++][1];
        }
        $this->fqcns->setNamespace($namespace);

        return $index;
    }

    /**
     * {@inheritDoc}
     */
    public function supports(array $tokens, $index)
    {
        return (isset($tokens[$index][0]) && T_NAMESPACE === $tokens[$index][0]);
    }
}
