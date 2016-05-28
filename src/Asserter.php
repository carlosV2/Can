<?php

namespace carlosV2\Can;

interface Asserter
{
    /**
     * @param mixed $data
     *
     * @return bool
     */
    public function check($data);
}
