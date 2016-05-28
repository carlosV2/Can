<?php

namespace carlosV2\Can;

interface AsserterInterface
{
    /**
     * @param mixed $data
     *
     * @return bool
     */
    public function check($data);
}
