<?php

namespace Gamesmkt\Fishpond;

use Gamesmkt\Fishpond\PlayerInterface;

class Player implements PlayerInterface
{
    /** $var string */
    private $name;

    /**
     * @param string $name The user Name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}
