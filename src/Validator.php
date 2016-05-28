<?php

namespace carlosV2\Can;

/**
 * @internal
 */
class Validator
{
    /**
     * @var mixed
     */
    private $data;

    /**
     * @param mixed $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @param AsserterInterface $asserter
     *
     * @return bool
     */
    public function claim(AsserterInterface $asserter)
    {
        return $asserter->check($this->data);
    }
}
