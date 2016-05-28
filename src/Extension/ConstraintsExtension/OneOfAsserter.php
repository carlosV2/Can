<?php

namespace carlosV2\Can\Extension\ConstraintsExtension;

use carlosV2\Can\AsserterInterface;

class OneOfAsserter implements AsserterInterface
{
    /**
     * @var AsserterInterface[]
     */
    private $asserters;

    public function __construct(/* ... */)
    {
        $this->asserters = func_get_args();
    }

    /**
     * @inheritdoc
     */
    public function check($data)
    {
        foreach ($this->asserters as $asserter) {
            if ($asserter->check($data)) {
                return true;
            }
        }

        return false;
    }
}
