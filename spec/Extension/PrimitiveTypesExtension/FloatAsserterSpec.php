<?php

namespace spec\carlosV2\Can\Extension\PrimitiveTypesExtension;

use carlosV2\Can\Asserter;
use PhpSpec\ObjectBehavior;

class FloatAsserterSpec extends ObjectBehavior
{
    function it_is_an_Asserter()
    {
        $this->shouldHaveType(Asserter::class);
    }

    function it_returns_true_for_integer_numbers()
    {
        $this->check(123)->shouldReturn(true);
    }

    function it_returns_true_for_float_numbers()
    {
        $this->check(12.3)->shouldReturn(true);
    }

    function it_returns_false_for_anything_but_integers_or_floats()
    {
        $this->check('abc')->shouldReturn(false);
        $this->check(null)->shouldReturn(false);
        $this->check([])->shouldReturn(false);
        $this->check(true)->shouldReturn(false);
    }

    function it_ensures_the_float_has_an_included_minimum_value()
    {
        $this->withIncludedMin(12.3)->shouldReturn($this);

        $this->check(12.2999)->shouldReturn(false);
        $this->check(12.3)->shouldReturn(true);
        $this->check(12.3001)->shouldReturn(true);
    }

    function it_ensures_the_float_has_an_excluded_minimum_value()
    {
        $this->withExcludedMin(12.3)->shouldReturn($this);

        $this->check(12.2999)->shouldReturn(false);
        $this->check(12.3)->shouldReturn(false);
        $this->check(12.3001)->shouldReturn(true);
    }

    function it_ensures_the_float_has_an_included_maximum_value()
    {
        $this->withIncludedMax(12.3)->shouldReturn($this);

        $this->check(12.2999)->shouldReturn(true);
        $this->check(12.3)->shouldReturn(true);
        $this->check(12.3001)->shouldReturn(false);
    }

    function it_ensures_the_float_has_an_excluded_maximum_value()
    {
        $this->withExcludedMax(12.3)->shouldReturn($this);

        $this->check(12.2999)->shouldReturn(true);
        $this->check(12.3)->shouldReturn(false);
        $this->check(12.3001)->shouldReturn(false);
    }
}
