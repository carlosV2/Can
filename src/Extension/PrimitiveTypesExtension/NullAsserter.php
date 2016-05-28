<?php

namespace carlosV2\Can\Extension\PrimitiveTypesExtension;

use carlosV2\Can\Asserter;

class NullAsserter implements Asserter
{
    /**
     * @inheritdoc
     */
    public function check($data)
    {
        return is_null($data);
    }
}
