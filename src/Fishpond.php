<?php

namespace Gamesmkt\Fishpond;

use DateTime;
use Gamesmkt\Fishpond\AdapterInterface;
use Gamesmkt\Fishpond\Adapter\AutoCreatePlayer;
use Gamesmkt\Fishpond\Adapter\CanFetchRecords;
use Gamesmkt\Fishpond\Adapter\CanFetchRecordsByContext;
use Gamesmkt\Fishpond\ConfigAwareTrait;
use Gamesmkt\Fishpond\Exception\NotSupportingException;
use Gamesmkt\Fishpond\FishpondInterface;
use Gamesmkt\Fishpond\Game;
use Gamesmkt\Fishpond\Player;
use Gamesmkt\Fishpond\Record;
use Gamesmkt\Fishpond\Transaction;
use Gamesmkt\Fishpond\Type;

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
    public function prepareCreatePlayer(Player $player, array $config = [])
    {
        $config = $this->prepareConfig($config);

        if (!$object = $this->getAdapter()->prepareCreatePlayer($player, $config)) {
            return false;
        }

        $player->name = $object['player']->name;

        return $player;
    }

    /**
     * @inheritdoc
     */
    public function createPlayer(Player $player, array $config = [])
    {
        $config = $this->prepareConfig($config);

        if ($this->getAdapter() instanceof AutoCreatePlayer) {
            return (bool) $object = $this->getAdapter()->getBalance($player, $config);
        }

        return (bool) $object = $this->getAdapter()->createPlayer($player, $config);
    }

    /**
     * @inheritdoc
     */
    public function getLoginUrl(Player $player, Game $game, array $config = [])
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
    public function logout(Player $player, Game $game = null, array $config = [])
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
    public function getBalance(Player $player, array $config = [])
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
    public function prepareTransfer(Transaction $transaction, array $config = [])
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
    public function transfer(Transaction $transaction, array $config = [])
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
    public function getTransferRecord(Transaction $transaction, array $config = [])
    {
        $config = $this->prepareConfig($config);

        if (!$object = $this->getAdapter()->getTransferRecord($transaction, $config)) {
            return false;
        }

        return $object;
    }

    /**
     * @inheritdoc
     */
    public function fetchRecords(Type $type, DateTime $start, DateTime $end, array $config = [])
    {
        $config = $this->prepareConfig($config);

        if (!$this->getAdapter() instanceof CanFetchRecords) {
            throw new NotSupportingException(
                get_class($this->getAdapter()) . ' does not support fetch record.'
            );
        }

        $this->assertDonate();

        if (!$array = $this->getAdapter()->fetchRecords($type, $start, $end, $config)) {
            return false;
        }

        if ((int) $type === Type::TYPE_BET) {
            $array = $this->normalizeBetRecord($array, $config);
        }

        return $array;
    }

    /**
     * @inheritdoc
     */
    public function fetchRecordsByContext(TypeInterface $type, string $context, array $config = [])
    {
        $config = $this->prepareConfig($config);

        if (!$this->getAdapter() instanceof CanFetchRecordsByContext) {
            throw new NotSupportingException(
                get_class($this->getAdapter()) . ' does not support fetch record by context.'
            );
        }

        $this->assertDonate();

        if (!$array = $this->getAdapter()->fetchRecordsByContext($type, $context, $config)) {
            return false;
        }

        if ((int) $type === Type::TYPE_BET) {
            $array = $this->normalizeBetRecord($array, $config);
        }

        return $array;
    }

    /**
     * @inheritdoc
     */
    public function fetchRecordsByDirectWithMark(TypeInterface $type, array $listCompleteRecord, array $config = [])
    {
        $config = $this->prepareConfig($config);

        if (!$this->getAdapter() instanceof CanFetchRecordsByDirectWithMark) {
            throw new NotSupportingException(
                get_class($this->getAdapter()) . ' does not support fetch record by direct with mark.'
            );
        }

        $this->assertDonate();

        if (!$array = $this->getAdapter()->fetchRecordsByDirectWithMark($type, $listCompleteRecord, $config)) {
            return false;
        }

        if ((int) $type === Type::TYPE_BET) {
            $array = $this->normalizeBetRecord($array, $config);
        }

        return $array;
    }

    /**
     * @inheritdoc
     */
    public function getGaemResultlUrl(Record $record, Game $game, array $config = [])
    {
        $config = $this->prepareConfig($config);

        if (!$array = $this->getAdapter()->getGaemResultlUrl($record, $game, $config)) {
            return false;
        }

        return $array;
    }

    /**
     * Assert support donate.
     *
     * @param \Gamesmkt\Fishpond\TypeInterface $type
     *
     * @throws \Gamesmkt\Fishpond\Exception\NotSupportingException
     *
     * @return void
     */
    public function assertDonate(Type $type)
    {
        if ((int) $type === Type::TYPE_DONATE && !$this->getAdapter() instanceof Donatable) {
            throw new NotSupportingException(
                get_class($this->getAdapter()) . ' does not support donate.'
            );
        }
    }

    /**
     * Assert support normalize bet record and run it.
     *
     * @param \Gamesmkt\Fishpond\Record[] $records
     * @param \Gamesmkt\Fishpond\Config $config
     *
     * @throws \Gamesmkt\Fishpond\Exception\NormalizeBetRecordException
     *
     * @return array
     */
    public function normalizeBetRecord(array $records, Config $config)
    {
        if (!$this->getAdapter() instanceof CanNormalizeBetRecor) {
            return $records;
        }

        if (!$records = $this->getAdapter()->normalizeBetRecord($records, $config)) {
            throw new NormalizeBetRecordException(
                get_class($this->getAdapter()) . ' could not normalize. Records:' . $records
            );
        }

        return $records;
    }
}
