<?php

namespace carlosV2\Can\Extension\PrimitiveTypesExtension;

use carlosV2\Can\AsserterInterface;

class ObjectAsserter implements AsserterInterface
{
    /**
     * @var string
     */
    private $requiredType;

    /**
     * @param string $type
     *
     * @return ObjectAsserter
     */
    public function withType($type)
    {
        $this->requiredType = $type;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function check($data)
    {
        if (!is_object($data)) {
            return false;
        }

        if (isset($this->requiredType)) {
            if (!is_a($data, $this->requiredType)) {
                return false;
            }
        }

        return true;
    }
}
