<?php

namespace Gamesmkt\Fishpond;

interface PlayerInterface
{
    /**
     * Get the name of the unique identifier for the player.
     *
     * @return string
     */
    public function getPlayerIdentifierName();

    /**
     * Get the unique identifier for the player.
     *
     * @return mixed
     */
    public function getAuthIdentifier();
}
