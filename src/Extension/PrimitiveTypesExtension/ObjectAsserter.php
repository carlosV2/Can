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
     * @var AsserterInterface[]
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
     * @param string $key
     *
     * @return ObjectAsserter
     */
    public function withKey($key)
    {
        $this->lastKey = $key;
        $this->keys[$key] = null;

        return $this;
    }

    /**
     * @param AsserterInterface $asserter
     *
     * @return ObjectAsserter
     */
    public function expected(AsserterInterface $asserter)
    {
        if (is_null($this->lastKey)) {
            throw new \BadMethodCallException();
        }

        $this->keys[$this->lastKey] = $asserter;

        return $this;
    }

    /**
     * @return ObjectAsserter
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
        if (!is_object($data)) {
            return false;
        }

        if (isset($this->requiredType)) {
            if (!is_a($data, $this->requiredType)) {
                return false;
            }
        }

        foreach ($this->keys as $key => $asserter) {
            if (!is_null($asserter)) {
                if (!$asserter->check($data->{$key})) {
                    return false;
                }
            }
        }

        if (!$this->otherKeysAllowed) {
            if (count(array_diff(array_keys(get_object_vars($data)), array_keys($this->keys))) > 0) {
                return false;
            }
        }

        return true;
    }
}
