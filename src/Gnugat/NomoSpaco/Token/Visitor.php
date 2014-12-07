<?php

namespace Gnugat\NomoSpaco\Token;

interface Visitor
{
    /**
     * @param array $tokens
     * @param int   $index
     *
     * @return int
     */
    public function visit(array $tokens, $index);

    /**
     * @param array $tokens
     * @param int   $index
     *
     * @return bool
     */
    public function supports(array $tokens, $index);
}
