<?php

namespace carlosV2\Can\Extension\ConstraintsExtension;

use carlosV2\Can\AsserterInterface;

class EqualsToAsserter implements AsserterInterface
{
    /**
     * @var mixed
     */
    private $value;

    /**
     * @param mixed $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @inheritDoc
     */
    public function check($data)
    {
        return $data === $this->value;
    }
}
