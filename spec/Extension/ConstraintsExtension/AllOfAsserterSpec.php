<?php

namespace spec\carlosV2\Can\Extension\ConstraintsExtension;

use carlosV2\Can\AsserterInterface;
use PhpSpec\ObjectBehavior;

class AllOfAsserterSpec extends ObjectBehavior
{
    function let(AsserterInterface $asserter1, AsserterInterface $asserter2, AsserterInterface $asserter3)
    {
        $asserter1->check(123)->willReturn(true);
        $asserter2->check(123)->willReturn(true);
        $asserter3->check(123)->willReturn(true);

        $this->beConstructedWith($asserter1, $asserter2, $asserter3);
    }

    function it_is_an_Asserter()
    {
        $this->shouldHaveType('carlosV2\Can\AsserterInterface');
    }

    function it_returns_true_if_all_the_asserters_return_true()
    {
        $this->check(123)->shouldReturn(true);
    }

    function it_returns_false_if_at_least_one_asserter_returns_false(AsserterInterface $asserter2)
    {
        $asserter2->check(123)->willReturn(false);

        $this->check(123)->shouldReturn(false);
    }
}
