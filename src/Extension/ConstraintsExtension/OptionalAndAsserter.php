<?php

namespace carlosV2\Can\Extension\ConstraintsExtension;

use carlosV2\Can\AsserterInterface;

class OptionalAndAsserter implements AsserterInterface
{
    /**
     * @var AsserterInterface
     */
    private $asserter;

    /**
     * @param AsserterInterface $asserter
     */
    public function __construct(AsserterInterface $asserter)
    {
        $this->asserter = $asserter;
    }

    /**
     * @inheritdoc
     */
    public function check($data)
    {
        if (is_null($data)) {
            return true;
        }

        return $this->asserter->check($data);
    }
}
