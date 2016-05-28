<?php

namespace spec\carlosV2\Can;

use carlosV2\Can\Asserter;

class TestAsserter implements Asserter
{
    /**
     * @var array
     */
    private $arguments;

    public function __construct(/* ... */)
    {
        $this->arguments = func_get_args();
    }

    /**
     * @return array
     */
    public function getArguments()
    {
        return $this->arguments;
    }

    public function check($data)
    {
    }
}
