<?php

namespace carlosV2\Can\Extension\PrimitiveTypesExtension;

use carlosV2\Can\AsserterInterface;

class CallableAsserter implements AsserterInterface
{
    /**
     * @inheritdoc
     */
    public function check($data)
    {
        return is_callable($data);
    }
}
