<?php

namespace spec\carlosV2\Can;

use carlosV2\Can\Extension;
use PhpSpec\ObjectBehavior;

class ToSpec extends ObjectBehavior
{
    function let(Extension $extension)
    {
        $extension->registerAsserters()->willReturn(['test' => 'spec\carlosV2\Can\TestAsserter']);

        $this->registerExtenstion($extension);
    }

    function it_registers_new_extensions(Extension $extension)
    {
        $extension->registerAsserters()->shouldBeCalled();
    }
    
    function it_instantiates_an_asserter()
    {
        $asserter = $this->__callStatic('beTest', []);
        $asserter->shouldBeAnInstanceOf('spec\carlosV2\Can\TestAsserter');
    }

    function it_instantiates_an_asserter_with_arguments()
    {
        $asserter = $this->__callStatic('beTest', ['my', 'arguments']);
        $asserter->shouldBeAnInstanceOf('spec\carlosV2\Can\TestAsserter');
        $asserter->getArguments()->shouldReturn(['my', 'arguments']);
    }

    function it_throws_an_exception_if_the_asserter_is_not_found()
    {
        $this->shouldThrow('carlosV2\Can\Exception\AsserterNotFoundException')->during('__callStatic', ['beUnexisting', []]);
    }

    function it_throws_an_exception_if_it_does_not_start_with_be()
    {
        $this->shouldThrow('carlosV2\Can\Exception\AsserterNotFoundException')->during('__callStatic', ['isTest', []]);
    }
}
