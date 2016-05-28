<?php

namespace carlosV2\Can\Extension\PrimitiveTypesExtension;

use carlosV2\Can\Extension;

class PrimitiveTypesExtension implements Extension
{
    /**
     * @inheritdoc
     */
    public function registerAsserters()
    {
        return [
            'string' => StringAsserter::class,
            'integer' => IntegerAsserter::class,
            'int' => IntegerAsserter::class,
            'float' => FloatAsserter::class,
            'array' => ArrayAsserter::class,
            'null' => NullAsserter::class,
            'bool' => BooleanAsserter::class,
            'boolean' => BooleanAsserter::class,
            'callable' => CallableAsserter::class
        ];
    }
}
