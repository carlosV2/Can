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
     * @param Asserter $asserter
     *
     * @return bool
     */
    public function claim(Asserter $asserter)
    {
        return $asserter->check($this->data);
    }
}
