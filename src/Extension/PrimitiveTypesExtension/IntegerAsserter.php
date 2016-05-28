<?php

namespace carlosV2\Can\Extension\PrimitiveTypesExtension;

use carlosV2\Can\AsserterInterface;

class IntegerAsserter implements AsserterInterface
{
    /**
     * @var int|null
     */
    private $min;

    /**
     * @var int|null
     */
    private $max;

    /**
     * @param int $min
     *
     * @return IntegerAsserter
     */
    public function withMin($min)
    {
        $this->min = $min;

        return $this;
    }

    /**
     * @param int $max
     *
     * @return IntegerAsserter
     */
    public function withMax($max)
    {
        $this->max = $max;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function check($data)
    {
        if (!is_int($data)) {
            return false;
        }

        if (isset($this->min)) {
            if ($data < $this->min) {
                return false;
            }
        }

        if (isset($this->max)) {
            if ($data > $this->max) {
                return false;
            }
        }

        return true;
    }
}
