<?php

namespace spec\carlosV2\Can\Extension\PrimitiveTypesExtension;

use carlosV2\Can\AsserterInterface;
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

    function it_ensures_it_only_contains_accepted_keys()
    {
        $this->withKey('k1')->shouldReturn($this);
        $this->withKey('k2')->shouldReturn($this);
        $this->withNoOtherKeys()->shouldReturn($this);

        $object1 = new \stdClass();
        $object1->k1 = 'val1';

        $object2 = new \stdClass();
        $object2->k1 = 'val1';
        $object2->k2 = 'val2';

        $object3 = new \stdClass();
        $object3->k1 = 'val1';
        $object3->k2 = 'val2';
        $object3->k3 = 'val3';

        $this->check($object1)->shouldReturn(true);
        $this->check($object2)->shouldReturn(true);
        $this->check($object3)->shouldReturn(false);
    }

    function it_ensures_the_keys_types(AsserterInterface $asserterK1, AsserterInterface $asserterK2)
    {
        $asserterK1->check('val1')->willReturn(true);
        $asserterK1->check(1)->willReturn(false);
        $asserterK2->check('val2')->willReturn(true);

        $this->withKey('k1')->shouldReturn($this);
        $this->expected($asserterK1)->shouldReturn($this);
        $this->withKey('k2')->shouldReturn($this);
        $this->expected($asserterK2)->shouldReturn($this);

        $object1 = new \stdClass();
        $object1->k1 = 'val1';
        $object1->k2 = 'val2';

        $object2 = new \stdClass();
        $object2->k1 = 1;
        $object2->k2 = 'val2';

        $this->check($object1)->shouldReturn(true);
        $this->check($object2)->shouldReturn(false);
    }

    function it_ensures_the_object_is_of_an_specific_type()
    {
        $this->withType('\DateTime')->shouldReturn($this);

        $this->check(new \stdClass())->shouldReturn(false);
        $this->check(new \DateTime())->shouldReturn(true);
    }
}
