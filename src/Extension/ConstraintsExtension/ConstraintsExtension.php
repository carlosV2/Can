<?php

namespace carlosV2\Can\Extension\ConstraintsExtension;

use carlosV2\Can\ExtensionInterface;

class ConstraintsExtension implements ExtensionInterface
{
    public function registerAsserters()
    {
        return [
            'optionalAnd' => 'carlosV2\Can\Extension\ConstraintsExtension\OptionalAndAsserter',
            'allOf' => 'carlosV2\Can\Extension\ConstraintsExtension\AllOfAsserter',
            'oneOf' => 'carlosV2\Can\Extension\ConstraintsExtension\OneOfAsserter',
            'equalsTo' => 'carlosV2\Can\Extension\ConstraintsExtension\EqualsToAsserter',
            'like' => 'carlosV2\Can\Extension\ConstraintsExtension\LikeAsserter',
        ];
    }
}
