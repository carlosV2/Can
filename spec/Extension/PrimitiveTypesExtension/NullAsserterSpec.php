<?php

namespace spec\carlosV2\Can\Extension\PrimitiveTypesExtension;

use PhpSpec\ObjectBehavior;

class NullAsserterSpec extends ObjectBehavior
{
    function it_is_an_Asserter()
    {
        $this->shouldHaveType('carlosV2\Can\AsserterInterface');
    }

    function it_returns_true_for_null()
    {
        $this->check(null)->shouldReturn(true);
    }

    function it_returns_false_for_anything_but_null()
    {
        $this->check(123)->shouldReturn(false);
        $this->check('abc')->shouldReturn(false);
        $this->check(12.3)->shouldReturn(false);
        $this->check([])->shouldReturn(false);
        $this->check(true)->shouldReturn(false);
    }
}
