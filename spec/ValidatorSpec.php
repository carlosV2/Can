<?php

namespace spec\carlosV2\Can;

use carlosV2\Can\Asserter;
use PhpSpec\ObjectBehavior;

class ValidatorSpec extends ObjectBehavior
{
    function it_validates_the_data(Asserter $asserter)
    {
        $asserter->check('abc')->willReturn(true);

        $this->beConstructedWith('abc');
        $this->claim($asserter)->shouldReturn(true);
    }
}
