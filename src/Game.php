<?php

namespace Gamesmkt\Fishpond;

use Gamesmkt\Fishpond\GameInterface;

class Game implements GameInterface
{
    /** @var string */
    private $id;

    /**
     * @param string $id The game id
     */
    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function __toString()
    {
        return $this->id;
    }
}
