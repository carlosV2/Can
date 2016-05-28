<?php

namespace spec\carlosV2\Can\Exception;

use PhpSpec\ObjectBehavior;

class AsserterNotFoundExceptionSpec extends ObjectBehavior
{
    function it_is_an_Exception()
    {
        $this->shouldHaveType('\Exception');
    }
}
