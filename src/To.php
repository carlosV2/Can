<?php

namespace carlosV2\Can;

use carlosV2\Can\Exception\AsserterNotFoundException;
use carlosV2\Can\Extension\ConstraintsExtension\AllOfAsserter;
use carlosV2\Can\Extension\ConstraintsExtension\EqualsToAsserter;
use carlosV2\Can\Extension\ConstraintsExtension\LikeAsserter;
use carlosV2\Can\Extension\ConstraintsExtension\OneOfAsserter;
use carlosV2\Can\Extension\ConstraintsExtension\OptionalAndAsserter;
use carlosV2\Can\Extension\ConstraintsExtension\SetAsserter;
use carlosV2\Can\Extension\PrimitiveTypesExtension\ArrayAsserter;
use carlosV2\Can\Extension\PrimitiveTypesExtension\BooleanAsserter;
use carlosV2\Can\Extension\PrimitiveTypesExtension\CallableAsserter;
use carlosV2\Can\Extension\PrimitiveTypesExtension\FloatAsserter;
use carlosV2\Can\Extension\PrimitiveTypesExtension\IntegerAsserter;
use carlosV2\Can\Extension\PrimitiveTypesExtension\NullAsserter;
use carlosV2\Can\Extension\PrimitiveTypesExtension\ObjectAsserter;
use carlosV2\Can\Extension\PrimitiveTypesExtension\StringAsserter;

/**
 * @method static StringAsserter beString()
 * @method static IntegerAsserter beInteger()
 * @method static IntegerAsserter beInt()
 * @method static FloatAsserter beFloat()
 * @method static ArrayAsserter beArray()
 * @method static NullAsserter beNull()
 * @method static BooleanAsserter beBool()
 * @method static BooleanAsserter beBoolean()
 * @method static CallableAsserter beCallable()
 * @method static ObjectAsserter beObject()
 * @method static OptionalAndAsserter beOptionalAnd(AsserterInterface $asserter)
 * @method static AllOfAsserter beAllOf(AsserterInterface ...$asserters)
 * @method static OneOfAsserter beOneOf(AsserterInterface ...$asserters)
 * @method static EqualsToAsserter beEqualsTo(mixed $value)
 * @method static LikeAsserter beLike(mixed $value)
 * @method static SetAsserter beSet()
 */
class To
{
    /**
     * @var array
     */
    private static $asserters = [];
    
    /**
     * @param ExtensionInterface $extension
     */
    public static function registerExtenstion(ExtensionInterface $extension)
    {
        foreach ($extension->registerAsserters() as $name => $asserter) {
            self::$asserters[strtolower($name)] = $asserter;
        }
    }

    /**
     * @param string $name
     * @param array  $arguments
     *
     * @return AsserterInterface
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
