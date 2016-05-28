<?php

namespace spec\carlosV2\Can\Extension\PrimitiveTypesExtension;

use PhpSpec\ObjectBehavior;

class IntegerAsserterSpec extends ObjectBehavior
{
    function it_is_an_Asserter()
    {
        $this->shouldHaveType('carlosV2\Can\Asserter');
    }

    function it_returns_true_for_integer_numbers()
    {
        $this->check(123)->shouldReturn(true);
    }

    function it_returns_false_for_anything_but_integer_numbers()
    {
        $this->check('abc')->shouldReturn(false);
        $this->check(null)->shouldReturn(false);
        $this->check(12.3)->shouldReturn(false);
        $this->check([])->shouldReturn(false);
        $this->check(true)->shouldReturn(false);
    }

    function it_ensures_the_integer_has_a_minimum_value()
    {
        $this->withMin(123)->shouldReturn($this);

        $this->check(122)->shouldReturn(false);
        $this->check(123)->shouldReturn(true);
        $this->check(124)->shouldReturn(true);
    }

    function it_ensures_the_integer_has_a_maximum_value()
    {
        $this->withMax(123)->shouldReturn($this);

        $this->check(122)->shouldReturn(true);
        $this->check(123)->shouldReturn(true);
        $this->check(124)->shouldReturn(false);
    }
}
