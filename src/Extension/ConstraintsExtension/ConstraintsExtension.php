<?php

namespace carlosV2\Can\Extension\ConstraintsExtension;

use carlosV2\Can\Extension;

class ConstraintsExtension implements Extension
{
    public function registerAsserters()
    {
        return [
            'optionalAnd' => OptionalAndAsserter::class,
            'allOf' => AllOfAsserter::class,
            'oneOf' => OneOfAsserter::class
        ];
    }
}
