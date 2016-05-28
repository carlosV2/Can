<?php

namespace spec\carlosV2\Can\Extension\PrimitiveTypesExtension;

use carlosV2\Can\Asserter;
use PhpSpec\ObjectBehavior;

class BooleanAsserterSpec extends ObjectBehavior
{
    function it_is_an_Asserter()
    {
        $this->shouldHaveType(Asserter::class);
    }

    function it_returns_true_for_boolean()
    {
        $this->check(false)->shouldReturn(true);
    }

    function it_returns_false_for_anything_but_boolean()
    {
        $this->check(123)->shouldReturn(false);
        $this->check('abc')->shouldReturn(false);
        $this->check(12.3)->shouldReturn(false);
        $this->check([])->shouldReturn(false);
        $this->check(null)->shouldReturn(false);
    }
}
