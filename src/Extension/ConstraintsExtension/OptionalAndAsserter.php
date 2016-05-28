<?php

namespace carlosV2\Can\Extension\ConstraintsExtension;

use carlosV2\Can\Asserter;

class OptionalAndAsserter implements Asserter
{
    /**
     * @var Asserter
     */
    private $asserter;

    /**
     * @param Asserter $asserter
     */
    public function __construct(Asserter $asserter)
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
