<?php

namespace carlosV2\Can;

use carlosV2\Can\Exception\AsserterNotFoundException;

class To
{
    /**
     * @var array
     */
    private static $asserters = [];
    
    /**
     * @param Extension $extension
     */
    public static function registerExtenstion(Extension $extension)
    {
        foreach ($extension->registerAsserters() as $name => $asserter) {
            self::$asserters[strtolower($name)] = $asserter;
        }
    }

    /**
     * @param string $name
     * @param array  $arguments
     *
     * @return Asserter
     *
     * @throws AsserterNotFoundException
     */
    public static function __callStatic($name, $arguments)
    {
        $name = strtolower($name);

        if (strpos($name, 'be') === 0) {
            $name = substr($name, 2);

            if (array_key_exists($name, self::$asserters)) {
                $rflClass = new \ReflectionClass(self::$asserters[$name]);
                return $rflClass->newInstanceArgs($arguments);
            }
        }

        throw new AsserterNotFoundException();
    }
}
