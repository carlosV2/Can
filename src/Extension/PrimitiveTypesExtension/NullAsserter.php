<?php

namespace carlosV2\Can\Extension\PrimitiveTypesExtension;

use carlosV2\Can\AsserterInterface;

class NullAsserter implements AsserterInterface
{
    /**
     * @inheritdoc
     */
    public function check($data)
    {
        return is_null($data);
    }
}
