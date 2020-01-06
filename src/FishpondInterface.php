<?php

namespace Gamesmkt\Fishpond;

use Gamesmkt\Fishpond\GameInterface;
use Gamesmkt\Fishpond\PlayerInterface;
use Gamesmkt\Fishpond\TransactionInterface;

interface FishpondInterface
{
    /**
     * 準備建立一名玩家。
     *
     * @param \Gamesmkt\Fishpond\PlayerInterface $player The player class.
     * @param array $config An optional configuration array.
     *
     * @return \Gamesmkt\Fishpond\PlayerInterface|false The Player class.
     */
    public function prepareCreatePlayer(PlayerInterface $player, array $config = []);

    /**
     * 建立一名玩家。
     *
     * @param \Gamesmkt\Fishpond\PlayerInterface $player The player class.
     * @param array $config An optional configuration array.
     *
     * @return bool True on success, false on failure.
     */
    public function createPlayer(PlayerInterface $player, array $config = []);

    /**
     * 取得登入網址。
     *
     * @param \Gamesmkt\Fishpond\PlayerInterface $player The player class.
     * @param \Gamesmkt\Fishpond\GameInterface $game The game class.
     * @param array $config An optional configuration array.
     *
     * @return string|false The login url or false on failure.
     */
    public function getLoginUrl(PlayerInterface $player, GameInterface $game, array $config = []);

    /**
     * 取得試玩網址。
     *
     * @param \Gamesmkt\Fishpond\GameInterface $game The game class.
     * @param array $config An optional configuration array.
     *
     * @return string|false The login url or false on failure.
     */
    public function getDemoUrl(GameInterface $game, array $config = []);

    /**
     * 登出一名玩家。
     *
     * @param \Gamesmkt\Fishpond\PlayerInterface $player The player class.
     * @param \Gamesmkt\Fishpond\GameInterface $game An optional game class.
     * @param array $config An optional configuration array.
     *
     * @return bool True on success, false on failure.
     */
    public function logout(PlayerInterface $player, GameInterface $game = null, array $config = []);

    /**
     * 取得玩家餘額。
     *
     * @param \Gamesmkt\Fishpond\PlayerInterface $player The player class.
     * @param array $config An optional configuration array.
     *
     * @return string|false The balance or false on failure.
     */
    public function getBalance(PlayerInterface $player, array $config = []);

    /**
     * 準備執行一個轉帳。
     *
     * @param \Gamesmkt\Fishpond\TransactionInterface $transaction The transaction class.
     * @param array $config An optional configuration array.
     *
     * @return \Gamesmkt\Fishpond\TransactionInterface|false The transaction class.
     */
    public function prepareTransfer(TransactionInterface $transaction, array $config = []);

    /**
     * 執行轉帳。
     *
     * @param \Gamesmkt\Fishpond\TransactionInterface $transaction The transaction class.
     * @param array $config An optional configuration array.
     *
     * @return \Gamesmkt\Fishpond\TransactionInterface|false The transaction class or false on failure.
     */
    public function transfer(TransactionInterface $transaction, array $config = []);

    /**
     * 查詢轉帳紀錄。
     *
     * @param \Gamesmkt\Fishpond\TransactionInterface $transaction The transaction class.
     * @param array $config An optional configuration array.
     *
     * @return \Gamesmkt\Fishpond\TransactionInterface|false The transaction class or false on failure.
     */
    public function queryTransfer(TransactionInterface $transaction, array $config = []);

    /**
     * 透過時間抓取紀錄。
     *
     * @param \Gamesmkt\Fishpond\TypeInterface $type
     * @param \DateTime $start
     * @param \DateTime $end
     * @param array $config An optional configuration array.
     *
     * @return \Gamesmkt\Fishpond\Record[]|false The records or false on failure.
     */
    public function fetchRecords(TypeInterface $type, DateTime $start, DateTime $end, array $config = []);

    /**
     * 透過上下文抓取紀錄。
     *
     * @param \Gamesmkt\Fishpond\TypeInterface $type
     * @param string $context
     * @param array $config An optional configuration array.
     *
     * @return \Gamesmkt\Fishpond\Record[]|false The records or false on failure.
     */
    public function fetchRecordsByContext(TypeInterface $type, string $context, array $config = []);

    /**
     * 直接抓取未被標記的紀錄，並藉由傳遞清單來標記已抓取的紀錄。
     *
     * @param \Gamesmkt\Fishpond\TypeInterface $type
     * @param array $listCompleteRecord An optional array.
     * @param array $config An optional configuration array.
     *
     * @return \Gamesmkt\Fishpond\Record[]|false The records or false on failure.
     */
    public function fetchRecordsByDirectWithMark(TypeInterface $type, array $listCompleteRecord = [], array $config = []);

    /**
     * 取得詳細紀錄的網址。
     *
     * @param \Gamesmkt\Fishpond\RecordInterface $record
     * @param \Gamesmkt\Fishpond\GameInterface $game
     * @param array $config An optional configuration array.
     *
     * @return string|false The balance or false on failure.
     */
    public function getRecordDetailUrl(RecordInterface $record, GameInterface $game, array $config = []);
}
