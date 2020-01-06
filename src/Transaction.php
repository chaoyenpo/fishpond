<?php

namespace Gamesmkt\Fishpond;

use Gamesmkt\Fishpond\TransactionInterface;
use InvalidArgumentException;

class Transaction implements TransactionInterface
{
    const METHOD_DEPOSIT = 1;

    const METHOD_WITHDRAW = 2;

    const STATUS_PENDDING = 1;

    const STATUS_COMPLETE = 2;

    const STATUS_FAILED = 3;

    const STATUS_ERROR = 4;

    /** $var int */
    private $method;

    /** $var string */
    private $name;

    /** $var string */
    private $id;

    /** $var string */
    private $amount;

    /** $var int */
    private $status;

    /**
     * @param int $method Transaction method
     * @param string $name The user name
     * @param string $id Id
     * @param string $amount Amount
     * @param string $status Status
     */
    public function __construct(
        int $method,
        string $name,
        string $id,
        string $amount,
        int $status
    ) {
        $this->assertMethod($method);
        $this->assertStatus($status);

        $this->method = $method;
        $this->name = $name;
        $this->id = $id;
        $this->amount = $amount;
        $this->status = $status;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function withStatus($status)
    {
        $this->assertStatus($status);
        $new = clone $this;
        $new->status = $status;
        return $new;
    }

    private function assertMethod($method)
    {
        if (!is_int($method) || $method <= 0) {
            throw new InvalidArgumentException('Method must be an integer and more then zero.');
        }

        switch ($method) {
            case self::METHOD_DEPOSIT:
                break;
            case self::METHOD_WITHDRAW:
                break;
            default:
                throw new InvalidArgumentException("Not support [$method] method.");
        }
    }

    private function assertStatus($status)
    {
        if (!is_int($status) || $status <= 0) {
            throw new InvalidArgumentException('Status must be an integer and more then zero.');
        }

        switch ($status) {
            case self::STATUS_PENDDING:
                break;
            case self::STATUS_COMPLETE:
                break;
            case self::STATUS_FAILED:
                break;
            case self::STATUS_ERROR:
                break;
            default:
                throw new InvalidArgumentException("Not support [$status] status.");
        }
    }
}
