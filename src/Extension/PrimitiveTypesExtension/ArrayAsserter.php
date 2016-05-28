<?php

namespace carlosV2\Can\Extension\PrimitiveTypesExtension;

use carlosV2\Can\Asserter;

class ArrayAsserter implements Asserter
{
    /**
     * @var integer
     */
    private $min;

    /**
     * @var integer
     */
    private $max;

    /**
     * @var Asserter
     */
    private $valuesAsserter;

    /**
     * @var Asserter[]
     */
    private $keys;

    /**
     * @var string
     */
    private $lastKey;

    /**
     * @var bool
     */
    private $otherKeysAllowed;

    public function __construct()
    {
        $this->keys = [];
        $this->otherKeysAllowed = true;
    }

    /**
     * @param integer $min
     *
     * @return ArrayAsserter
     */
    public function withMinCount($min)
    {
        $this->min = $min;

        return $this;
    }

    /**
     * @param integer $max
     *
     * @return ArrayAsserter
     */
    public function withMaxCount($max)
    {
        $this->max = $max;

        return $this;
    }

    /**
     * @param Asserter $valuesAsserter
     *
     * @return ArrayAsserter
     */
    public function withValuesExpected(Asserter $valuesAsserter)
    {
        $this->valuesAsserter = $valuesAsserter;

        return $this;
    }

    /**
     * @param string $key
     *
     * @return ArrayAsserter
     */
    public function withKey($key)
    {
        $this->lastKey = $key;
        $this->keys[$key] = null;

        return $this;
    }

    /**
     * @param Asserter $asserter
     *
     * @return ArrayAsserter
     */
    public function expected(Asserter $asserter)
    {
        if (is_null($this->lastKey)) {
            throw new \BadMethodCallException();
        }

        $this->keys[$this->lastKey] = $asserter;

        return $this;
    }
    
    /**
     * @return ArrayAsserter
     */
    public function withNoOtherKeys()
    {
        $this->otherKeysAllowed = false;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function check($data)
    {
        if (!is_array($data)) {
            return false;
        }

        if (isset($this->min)) {
            if (count($data) < $this->min) {
                return false;
            }
        }

        if (isset($this->max)) {
            if (count($data) > $this->max) {
                return false;
            }
        }

        if (isset($this->valuesAsserter)) {
            foreach ($data as $value) {
                if (!$this->valuesAsserter->check($value)) {
                    return false;
                }
            }
        }

        foreach ($this->keys as $key => $asserter) {
            if (!is_null($asserter)) {
                if (!$asserter->check(@$data[$key])) {
                    return false;
                }
            }
        }

        if (!$this->otherKeysAllowed) {
            if (count(array_diff(array_keys($data), array_keys($this->keys))) > 0) {
                return false;
            }
        }

        return true;
    }
}
