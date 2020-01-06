<?php

namespace Gamesmkt\Fishpond;

interface MustPreTransfer
{
    /**
     * Pre transfer
     *
     * @param \Gamesmkt\Fishpond\CanBePlayer|mixed $player
     * @param mixed $action
     * @param \Gamesmkt\Fishpond\Config|null $config
     * @return \Gamesmkt\Fishpond\Result\PreTransferResult|mixed
     */
    public function preTransfer($player, $action, $config = null);
}
