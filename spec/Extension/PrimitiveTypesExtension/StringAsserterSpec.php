<?php

namespace spec\carlosV2\Can\Extension\PrimitiveTypesExtension;

use PhpSpec\ObjectBehavior;

class StringAsserterSpec extends ObjectBehavior
{
    function it_is_an_Asserter()
    {
        $this->shouldHaveType('carlosV2\Can\AsserterInterface');
    }

    function it_returns_true_for_an_string()
    {
        $this->check('abc')->shouldReturn(true);
    }

    function it_returns_true_for_an_string_containing_a_number()
    {
        $this->check('123')->shouldReturn(true);
    }

    function it_returns_false_for_anything_but_strings()
    {
        $this->check(123)->shouldReturn(false);
        $this->check(null)->shouldReturn(false);
        $this->check(12.3)->shouldReturn(false);
        $this->check([])->shouldReturn(false);
        $this->check(true)->shouldReturn(false);
    }

    function it_ensures_the_string_has_a_minimum_length()
    {
        $this->withMinLength(2)->shouldReturn($this);

        $this->check('a')->shouldReturn(false);
        $this->check('ab')->shouldReturn(true);
        $this->check('abc')->shouldReturn(true);
    }

    function it_ensures_the_string_has_a_maximum_length()
    {
        $this->withMaxLength(2)->shouldReturn($this);

        $this->check('a')->shouldReturn(true);
        $this->check('ab')->shouldReturn(true);
        $this->check('abc')->shouldReturn(false);
    }
}
