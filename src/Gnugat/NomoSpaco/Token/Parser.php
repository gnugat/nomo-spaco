<?php

namespace Gnugat\NomoSpaco\Token;

class Parser
{
    /**
     * @var array
     */
    private $visitors = array();

    /**
     * @param Visitor $visitor
     */
    public function addVisitor(Visitor $visitor)
    {
        $this->visitors[] = $visitor;
    }

    /**
     * @param string $source
     */
    public function parse($source)
    {
        $tokens = token_get_all($source);
        $index = 0;
        for ($index = 0; isset($tokens[$index]); $index++) {
            foreach ($this->visitors as $visitor) {
                if ($visitor->supports($tokens, $index)) {
                    $index = $visitor->visit($tokens, $index);
                }
            }
        }
    }
}
