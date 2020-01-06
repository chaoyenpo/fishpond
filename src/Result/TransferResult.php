<?php

namespace Gamesmkt\Fishpond\Result;

class TransferResult extends Result
{
    /** @var string The external transaction status. */
    protected $transactionStatus;

    /**
     * Create a new transfer result.
     *
     * @param  bool $isSuccessful
     * @param  string $transactionStatus
     * @return void
     */
    public function __construct(bool $isSuccessful, string $transactionStatus)
    {
        parent::__construct($isSuccessful);

        $this->transactionStatus = $transactionStatus;
    }

    /**
     * @param string $transactionStatus
     * @return $this
     */
    public function setTransactionStatus(string $transactionStatus)
    {
        $this->transactionStatus = $transactionStatus;

        return $this;
    }

    /**
     * @return bool
     */
    public function transactionStatus()
    {
        return $this->transactionStatus;
    }
}
