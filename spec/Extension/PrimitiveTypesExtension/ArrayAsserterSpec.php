<?php

namespace spec\carlosV2\Can\Extension\PrimitiveTypesExtension;

use carlosV2\Can\AsserterInterface;
use PhpSpec\ObjectBehavior;

class ArrayAsserterSpec extends ObjectBehavior
{
    function _it_is_an_Asserter()
    {
        $this->shouldHaveType('carlosV2\Can\AsserterInterface');
    }

    function _it_returns_true_for_arrays()
    {
        $this->check([])->shouldReturn(true);
    }
    
    function _it_returns_false_for_anything_but_arrays()
    {
        $this->check(123)->shouldReturn(false);
        $this->check(null)->shouldReturn(false);
        $this->check(12.3)->shouldReturn(false);
        $this->check('abc')->shouldReturn(false);
        $this->check(true)->shouldReturn(false);
    }

    function _it_ensures_the_array_has_a_minimum_count()
    {
        $this->withMinCount(2)->shouldReturn($this);

        $this->check(['a'])->shouldReturn(false);
        $this->check(['a', 'b'])->shouldReturn(true);
        $this->check(['a', 'b', 'c'])->shouldReturn(true);
    }

    function _it_ensures_the_string_has_a_maximum_count()
    {
        $this->withMaxCount(2)->shouldReturn($this);

        $this->check(['a'])->shouldReturn(true);
        $this->check(['a', 'b'])->shouldReturn(true);
        $this->check(['a', 'b', 'c'])->shouldReturn(false);
    }

    function _it_ensures_the_values_types(AsserterInterface $asserter)
    {
        $asserter->check('a')->willReturn(true);
        $asserter->check('b')->willReturn(false);

        $this->withValuesExpected($asserter)->shouldReturn($this);

        $this->check(['a', 'a', 'a'])->shouldReturn(true);
        $this->check(['a', 'b', 'a'])->shouldReturn(false);
    }

    function it_ensures_it_only_contains_accepted_keys()
    {
        $this->withKey('k1')->shouldReturn($this);
        $this->withKey('k2')->shouldReturn($this);
        $this->withNoOtherKeys()->shouldReturn($this);

        $this->check(['k1' => 'val1'])->shouldReturn(true);
        $this->check(['k1' => 'val1', 'k2' => 'val2'])->shouldReturn(true);
        $this->check(['k1' => 'val1', 'k2' => 'val2', 'k3' => 'val3'])->shouldReturn(false);
    }

    function _it_ensures_the_keys_types(AsserterInterface $asserterK1, AsserterInterface $asserterK2)
    {
        $asserterK1->check('val1')->willReturn(true);
        $asserterK1->check(1)->willReturn(false);
        $asserterK2->check('val2')->willReturn(true);

        $this->withKey('k1')->shouldReturn($this);
        $this->expected($asserterK1)->shouldReturn($this);
        $this->withKey('k2')->shouldReturn($this);
        $this->expected($asserterK2)->shouldReturn($this);

        $this->check(['k1' => 'val1', 'k2' => 'val2'])->shouldReturn(true);
        $this->check(['k1' => 1, 'k2' => 'val2'])->shouldReturn(false);
    }

    function _it_does_not_allow_the_expected_to_be_called_without_a_key(AsserterInterface $asserter)
    {
        $this->shouldThrow('\BadMethodCallException')->duringExpected($asserter);
    }
}
