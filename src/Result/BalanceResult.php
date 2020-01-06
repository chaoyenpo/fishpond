<?php

namespace Gamesmkt\Fishpond\Result;

class BalanceResult extends Result
{
    /** @var string The player balance. */
    protected $balance;

    /**
     * Create a new balance result.
     *
     * @param  bool $isSuccessful
     * @param  string $balance
     * @return void
     */
    public function __construct(bool $isSuccessful, string $balance)
    {
        parent::__construct($isSuccessful);

        $this->balance = $balance;
    }

    /**
     * @param string $balance
     * @return $this
     */
    public function setBalance(string $balance)
    {
        $this->balance = $balance;

        return $this;
    }

    /**
     * @return bool
     */
    public function balance()
    {
        return $this->balance;
    }
}
