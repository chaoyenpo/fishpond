<?php

namespace Gamesmkt\Fishpond;

interface AdapterInterface
{
    /**
     * 建立一名玩家
     *
     * @param \Gamesmkt\Fishpond\CanBePlayer|mixed $player
     * @param \Gamesmkt\Fishpond\Config|null $config
     * @return \Gamesmkt\Fishpond\Results\Result|mixed
     */
    public function createPlayer($player, $config = null);

    /**
     * 取得登入網址
     * 
     * @todo 不同裝置要產生不同的登入網址
     * @todo 
     *
     * @param \Gamesmkt\Fishpond\CanBePlayer|mixed $player
     * @param \Gamesmkt\Fishpond\Playable|mixed $game
     * @param \Gamesmkt\Fishpond\Config|null $config
     * @return \Gamesmkt\Fishpond\Results\LoginResult|mixed
     */
    public function login($player, $game, $config = null);

    /**
     * 登出一名玩家
     *
     * @param \Gamesmkt\Fishpond\CanBePlayer|mixed $player
     * @param \Gamesmkt\Fishpond\Playable|mixed $game
     * @param \Gamesmkt\Fishpond\Config|null $config
     * @return \Gamesmkt\Fishpond\Results\Result|mixed
     */
    public function logout($player, $game, $config = null);

    /**
     * 取得玩家餘額
     *
     * @param \Gamesmkt\Fishpond\CanBePlayer|mixed $player
     * @param \Gamesmkt\Fishpond\Config|null $config
     * @return \Gamesmkt\Fishpond\Results\BalanceResult|mixed
     */
    public function balance($player, $config = null);

    /**
     * 轉帳一名玩家
     *
     * @param \Gamesmkt\Fishpond\CanBePlayer|mixed $player
     * @param \Gamesmkt\Fishpond\Transferable|mixed $transaction
     * @param \Gamesmkt\Fishpond\Config|null $config
     * @return \Gamesmkt\Fishpond\Results\TransferResult|mixed
     */
    public function transfer($player, $transaction, $config = null);

    /**
     * 查詢玩家轉帳紀錄
     *
     * @param \Gamesmkt\Fishpond\CanBePlayer|mixed $player
     * @param \Gamesmkt\Fishpond\Transferable|mixed $transaction
     * @param \Gamesmkt\Fishpond\Config|null $config
     * @return \Gamesmkt\Fishpond\Results\TransferResult|mixed
     */
    public function queryTransfer($player, $transaction, $config = null);
}
