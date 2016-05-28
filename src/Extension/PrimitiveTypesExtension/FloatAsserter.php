<?php

namespace carlosV2\Can\Extension\PrimitiveTypesExtension;

use carlosV2\Can\AsserterInterface;

class FloatAsserter implements AsserterInterface
{
    /**
     * @var float
     */
    private $min;

    /**
     * @var bool
     */
    private $minIncluded;

    /**
     * @var float
     */
    private $max;

    /**
     * @var bool
     */
    private $maxIncluded;

    /**
     * @param float $min
     *
     * @return FloatAsserter
     */
    public function withIncludedMin($min)
    {
        $this->min = $min;
        $this->minIncluded = true;

        return $this;
    }

    /**
     * @param float $min
     *
     * @return FloatAsserter
     */
    public function withExcludedMin($min)
    {
        $this->min = $min;
        $this->minIncluded = false;

        return $this;
    }

    /**
     * @param float $max
     *
     * @return FloatAsserter
     */
    public function withIncludedMax($max)
    {
        $this->max = $max;
        $this->maxIncluded = true;

        return $this;
    }

    /**
     * @param float $max
     *
     * @return FloatAsserter
     */
    public function withExcludedMax($max)
    {
        $this->max = $max;
        $this->maxIncluded = false;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function check($data)
    {
        // As per mathematical definition, integer numbers are contained within the real ones.
        if (!is_int($data) && !is_float($data)) {
            return false;
        }

        if (isset($this->min)) {
            if ($data < $this->min) {
                return false;
            }

            if (!$this->minIncluded && $data == $this->min) {
                return false;
            }
        }

        if (isset($this->max)) {
            if ($data > $this->max) {
                return false;
            }

            if (!$this->maxIncluded && $data == $this->max) {
                return false;
            }
        }

        return true;
    }
}
