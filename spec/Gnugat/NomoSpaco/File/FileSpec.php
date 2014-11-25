<?php

namespace spec\Gnugat\NomoSpaco\File;

use PhpSpec\ObjectBehavior;

class FileSpec extends ObjectBehavior
{
    const FILE_NAME = '/Fixtures/MyClass.php';
    const NAME_SPACE = 'spec\\Gnugat\\NomoSpaco\\File\\Fixtures';
    const CLASS_NAME = 'MyClass';

    function let()
    {
        $this->beConstructedWith(__DIR__.self::FILE_NAME);
    }

    function it_has_a_namespace()
    {
        $this->getNamespace()->shouldBe(self::NAME_SPACE);
    }

    function it_has_a_classname()
    {
        $this->getClassname()->shouldBe(self::CLASS_NAME);
    }
}
