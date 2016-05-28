<?php

namespace carlosV2\Can\Extension\PrimitiveTypesExtension;

use carlosV2\Can\Asserter;

class StringAsserter implements Asserter
{
    /**
     * @var integer
     */
    public $min;

    /**
     * @var integer
     */
    public $max;

    /**
     * @param integer $min
     *
     * @return StringAsserter
     */
    public function withMinLength($min)
    {
        $this->min = $min;

        return $this;
    }

    /**
     * @param integer $max
     *
     * @return StringAsserter
     */
    public function withMaxLength($max)
    {
        $this->max = $max;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function check($data)
    {
        if (!is_string($data)) {
            return false;
        }

        if (isset($this->min)) {
            if (strlen($data) < $this->min) {
                return false;
            }
        }

        if (isset($this->max)) {
            if (strlen($data) > $this->max) {
                return false;
            }
        }

        return true;
    }
}
