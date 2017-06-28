<?php

namespace spec\carlosV2\Can\Extension\ConstraintsExtension;

use PhpSpec\ObjectBehavior;

class SetAsserterSpec extends ObjectBehavior
{
    function it_is_an_Asserter()
    {
        $this->shouldHaveType('carlosV2\Can\AsserterInterface');
    }

    function it_returns_true_for_anything_but_null()
    {
        $this->check(123)->shouldReturn(true);
        $this->check('abc')->shouldReturn(true);
        $this->check(12.3)->shouldReturn(true);
        $this->check([])->shouldReturn(true);
        $this->check(true)->shouldReturn(true);
    }

    function it_returns_false_for_null()
    {
        $this->check(null)->shouldReturn(false);
    }
}
