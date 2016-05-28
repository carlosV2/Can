<?php

namespace spec\carlosV2\Can\Extension\ConstraintsExtension;

use carlosV2\Can\AsserterInterface;
use PhpSpec\ObjectBehavior;

class OptionalAndAsserterSpec extends ObjectBehavior
{
    function let(AsserterInterface $asserter)
    {
        $this->beConstructedWith($asserter);
    }

    function it_is_an_Asserter()
    {
        $this->shouldHaveType('carlosV2\Can\AsserterInterface');
    }

    function it_returns_true_for_null(AsserterInterface $asserter)
    {
        $this->check(null)->shouldReturn(true);

        $asserter->check(null)->shouldNotHaveBeenCalled();
    }

    function it_returns_true_if_the_asserter_returns_so_for_non_null_values(AsserterInterface $asserter)
    {
        $asserter->check(123)->willReturn(true);

        $this->check(123)->shouldReturn(true);
    }
}
