<?php

namespace spec\carlosV2\Can\Extension\ConstraintsExtension;

use carlosV2\Can\Asserter;
use PhpSpec\ObjectBehavior;

class OneOfAsserterSpec extends ObjectBehavior
{
    function let(Asserter $asserter1, Asserter $asserter2, Asserter $asserter3)
    {
        $asserter1->check(123)->willReturn(false);
        $asserter2->check(123)->willReturn(false);
        $asserter3->check(123)->willReturn(false);

        $this->beConstructedWith($asserter1, $asserter2, $asserter3);
    }

    function it_is_an_Asserter()
    {
        $this->shouldHaveType(Asserter::class);
    }

    function it_returns_true_if_at_least_one_asserter_returns_true(Asserter $asserter2)
    {
        $asserter2->check(123)->willReturn(true);

        $this->check(123)->shouldReturn(true);
    }

    function it_returns_false_if_all_the_asserters_returns_false()
    {
        $this->check(123)->shouldReturn(false);
    }
}
