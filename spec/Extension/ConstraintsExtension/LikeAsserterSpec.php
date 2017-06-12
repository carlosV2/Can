<?php

namespace spec\carlosV2\Can\Extension\ConstraintsExtension;

use PhpSpec\ObjectBehavior;

class LikeAsserterSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('123');
    }

    function it_is_an_Asserter()
    {
        $this->shouldHaveType('carlosV2\Can\AsserterInterface');
    }

    function it_returns_true_if_both_values_are_equals()
    {
        $this->check('123')->shouldReturn(true);
    }

    function it_returns_true_if_the_values_are_equals_but_have_different_type()
    {
        $this->check(123)->shouldReturn(true);
    }

    function it_returns_false_if_the_values_are_not_equals()
    {
        $this->check('321')->shouldReturn(false);
    }
}
