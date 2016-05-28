<?php

namespace carlosV2\Can\Extension\PrimitiveTypesExtension;

use carlosV2\Can\AsserterInterface;

class BooleanAsserter implements AsserterInterface
{
    /**
     * @inheritdoc
     */
    public function check($data)
    {
        return is_bool($data);
    }
}
