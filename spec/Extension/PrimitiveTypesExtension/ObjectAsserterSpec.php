<?php

namespace spec\carlosV2\Can\Extension\PrimitiveTypesExtension;

use PhpSpec\ObjectBehavior;

class ObjectAsserterSpec extends ObjectBehavior
{
    function it_is_an_Asserter()
    {
        $this->shouldHaveType('carlosV2\Can\AsserterInterface');
    }

    function it_returns_true_for_object()
    {
        $this->check(new \stdClass())->shouldReturn(true);
    }

    function it_returns_false_for_anything_but_object()
    {
        $this->check(123)->shouldReturn(false);
        $this->check('abc')->shouldReturn(false);
        $this->check(12.3)->shouldReturn(false);
        $this->check([])->shouldReturn(false);
        $this->check(null)->shouldReturn(false);
        $this->check(true)->shouldReturn(false);
    }

    function it_ensures_the_object_is_of_an_specific_type()
    {
        $this->withType('\DateTime')->shouldReturn($this);

        $this->check(new \stdClass())->shouldReturn(false);
        $this->check(new \DateTime())->shouldReturn(true);
    }
}
