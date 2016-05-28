<?php

namespace spec\carlosV2\Can\Extension\ConstraintsExtension;

use carlosV2\Can\Asserter;
use PhpSpec\ObjectBehavior;

class OptionalAndAsserterSpec extends ObjectBehavior
{
    function let(Asserter $asserter)
    {
        $this->beConstructedWith($asserter);
    }

    function it_is_an_Asserter()
    {
        $this->shouldHaveType('carlosV2\Can\Asserter');
    }

    function it_returns_true_for_null(Asserter $asserter)
    {
        $this->check(null)->shouldReturn(true);

        $asserter->check(null)->shouldNotHaveBeenCalled();
    }

    function it_returns_true_if_the_asserter_returns_so_for_non_null_values(Asserter $asserter)
    {
        $asserter->check(123)->willReturn(true);

        $this->check(123)->shouldReturn(true);
    }
}
