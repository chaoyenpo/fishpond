<?php

namespace Gamesmkt\Fishpond\Adapter\Polyfill;

trait AutoCreatePlayerTrait
{
    /**
     * @inheritdoc
     */
    public function createPlayer(PlayerInterface $player, Config $config)
    {
        $data['player'] = $player;

        return $data;
    }
}
