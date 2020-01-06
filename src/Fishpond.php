<?php

namespace Gamesmkt\Fishpond;

use Gamesmkt\Fishpond\AdapterInterface;
use Gamesmkt\Fishpond\ConfigAwareTrait;
use Gamesmkt\Fishpond\FishpondInterface;
use Gamesmkt\Fishpond\PlayerInterface;

class Fishpond implements FishpondInterface
{
    use ConfigAwareTrait;

    /**
     * @var AdapterInterface
     */
    protected $adapter;

    /**
     * Constructor.
     *
     * @param AdapterInterface $adapter
     * @param Config|array     $config
     */
    public function __construct(AdapterInterface $adapter, $config = null)
    {
        $this->adapter = $adapter;
        $this->setConfig($config);
    }

    /**
     * Get the Adapter.
     *
     * @return AdapterInterface adapter
     */
    public function getAdapter()
    {
        return $this->adapter;
    }

    /**
     * @inheritdoc
     */
    public function prepareCreatePlayer(PlayerInterface $player, array $config = [])
    {
        $config = $this->prepareConfig($config);

        return (bool) $object = $this->getAdapter()->prepareCreatePlayer($player, $config);
    }

    /**
     * @inheritdoc
     */
    public function createPlayer(PlayerInterface $player, array $config = [])
    {
        $config = $this->prepareConfig($config);

        return (bool) $object = $this->getAdapter()->createPlayer($player, $config);
    }

    /**
     * @inheritdoc
     */
    public function getLoginUrl(PlayerInterface $player, GameInterface $game, array $config = [])
    {
        $config = $this->prepareConfig($config);

        if (!$object = $this->getAdapter()->getLoginUrl($player, $game, $config)) {
            return false;
        }

        return $object['loginUrl'];
    }

    /**
     * @inheritdoc
     */
    public function getDemoUrl(GameInterface $game, array $config = [])
    {
        $config = $this->prepareConfig($config);

        if (!$object = $this->getAdapter()->getDemoUrl($game, $config)) {
            return false;
        }

        return $object['loginUrl'];
    }

    /**
     * @inheritdoc
     */
    public function logout(PlayerInterface $player, GameInterface $game = null, array $config = [])
    {
        $config = $this->prepareConfig($config);

        if ($game) {
            return (bool) $object = $this->getAdapter()->logout($player, $game, $config);
        }

        return (bool) $object = $this->getAdapter()->logout($player, $config);
    }

    /**
     * @inheritdoc
     */
    public function getBalance(PlayerInterface $player, array $config = [])
    {
        $config = $this->prepareConfig($config);

        if (!$object = $this->getAdapter()->getBalance($player, $config)) {
            return false;
        }

        return $object['balance'];
    }

    /**
     * @inheritdoc
     */
    public function prepareTransfer(TransactionInterface $transaction, array $config = [])
    {
        $config = $this->prepareConfig($config);

        if (!$object = $this->getAdapter()->prepareTransfer($transaction, $config)) {
            return false;
        }

        return $object;
    }

    /**
     * @inheritdoc
     */
    public function transfer(TransactionInterface $transaction, array $config = [])
    {
        $config = $this->prepareConfig($config);

        if (!$object = $this->getAdapter()->transfer($transaction, $config)) {
            return false;
        }

        return $object;
    }

    /**
     * @inheritdoc
     */
    public function queryTransfer(TransactionInterface $transaction, array $config = [])
    {
        $config = $this->prepareConfig($config);

        if (!$object = $this->getAdapter()->queryTransfer($transaction, $config)) {
            return false;
        }

        return $object;
    }

    /**
     * @inheritdoc
     */
    public function fetchRecords(TypeInterface $type, DateTime $start, DateTime $end, array $config = [])
    {
        $config = $this->prepareConfig($config);

        if (!$array = $this->getAdapter()->fetchRecords($type, $start, $end, $config)) {
            return false;
        }

        return $array;
    }

    /**
     * @inheritdoc
     */
    public function fetchRecordsByContext(TypeInterface $type, string $context, array $config = [])
    {
        $config = $this->prepareConfig($config);

        if (!$array = $this->getAdapter()->fetchRecordsByContext($type, $context, $config)) {
            return false;
        }

        return $array;
    }

    /**
     * @inheritdoc
     */
    public function fetchRecordsByDirectWithMark(TypeInterface $type, array $listCompleteRecord, array $config = [])
    {
        $config = $this->prepareConfig($config);

        if (!$array = $this->getAdapter()->fetchRecordsByDirectWithMark($type, $listCompleteRecord, $config)) {
            return false;
        }

        return $array;
    }

    /**
     * @inheritdoc
     */
    public function getRecordDetailUrl(RecordInterface $record, GameInterface $game, array $config = [])
    {
        $config = $this->prepareConfig($config);

        if (!$array = $this->getAdapter()->getRecordDetailUrl($record, $game, $config)) {
            return false;
        }

        return $array;
    }
}
