<?php

namespace Gamesmkt\Fishpond;

interface MustPreCreatePlayer
{
    /**
     * Pre Create Player.
     *
     * @param \Gamesmkt\Fishpond\Config|null $config
     * @return \Gamesmkt\Fishpond\Result\PreCreatePlayerResult|mixed
     */
    public function preCreatePlayer($config);
}
