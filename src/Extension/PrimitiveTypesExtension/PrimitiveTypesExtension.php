<?php

namespace carlosV2\Can\Extension\PrimitiveTypesExtension;

use carlosV2\Can\ExtensionInterface;

class PrimitiveTypesExtension implements ExtensionInterface
{
    /**
     * @inheritdoc
     */
    public function registerAsserters()
    {
        return [
            'string' => 'carlosV2\Can\Extension\PrimitiveTypesExtension\StringAsserter',
            'integer' => 'carlosV2\Can\Extension\PrimitiveTypesExtension\IntegerAsserter',
            'int' => 'carlosV2\Can\Extension\PrimitiveTypesExtension\IntegerAsserter',
            'float' => 'carlosV2\Can\Extension\PrimitiveTypesExtension\FloatAsserter',
            'array' => 'carlosV2\Can\Extension\PrimitiveTypesExtension\ArrayAsserter',
            'null' => 'carlosV2\Can\Extension\PrimitiveTypesExtension\NullAsserter',
            'bool' => 'carlosV2\Can\Extension\PrimitiveTypesExtension\BooleanAsserter',
            'boolean' => 'carlosV2\Can\Extension\PrimitiveTypesExtension\BooleanAsserter',
            'callable' => 'carlosV2\Can\Extension\PrimitiveTypesExtension\CallableAsserter',
            'object' => 'carlosV2\Can\Extension\PrimitiveTypesExtension\ObjectAsserter'
        ];
    }
}
