<?php

namespace Gamesmkt\Fishpond;

interface TypeInterface
{
    const TYPE_BET = 1;

    const TYPE_DONATE = 2;

    const TYPE_TRANSFER = 3;

    public function getType();
}
