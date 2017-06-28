<?php

namespace carlosV2\Can\Extension\ConstraintsExtension;

use carlosV2\Can\AsserterInterface;

class SetAsserter implements AsserterInterface
{
    /**
     * @inheritdoc
     */
    public function check($data)
    {
        return !is_null($data);
    }
}
