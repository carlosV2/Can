<?php

use carlosV2\Can\Validator;
use carlosV2\Can\To;
use carlosV2\Can\Extension\PrimitiveTypesExtension\PrimitiveTypesExtension;
use carlosV2\Can\Extension\ConstraintsExtension\ConstraintsExtension;

// Register extensions
To::registerExtenstion(new PrimitiveTypesExtension());
To::registerExtenstion(new ConstraintsExtension());

// Register function
if (!function_exists('can')) {
    /**
     * @param mixed $data
     *
     * @return Validator
     */
    function can($data)
    {
        return new Validator($data);
    }
}
