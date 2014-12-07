<?php

namespace Gnugat\NomoSpaco\Token;

class ParserFactory
{
    /**
     * @param FqcnCollection $fqcnCollection
     *
     * @return Parser
     */
    public function makeAll(FqcnCollection $fqcnCollection)
    {
        $namespaceVisitor = new NamespaceVisitor($fqcnCollection);
        $classnameVisitor = new ClassnameVisitor($fqcnCollection);
        $allParser = new Parser();
        $allParser->addVisitor($namespaceVisitor);
        $allParser->addVisitor($classnameVisitor);

        return $allParser;
    }

    /**
     * @param FqcnCollection $fqcnCollection
     *
     * @return Parser
     */
    public function makeFor(FqcnCollection $fqcnCollection, $classname)
    {
        $namespaceVisitor = new NamespaceVisitor($fqcnCollection);
        $forClassnameVisitor = new ForClassnameVisitor($fqcnCollection, $classname);
        $forParser = new Parser();
        $forParser->addVisitor($namespaceVisitor);
        $forParser->addVisitor($forClassnameVisitor);

        return $forParser;
    }
}
