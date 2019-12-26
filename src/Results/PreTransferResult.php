<?php

namespace Gamesmkt\Fishpond\Results;

class PreTransferResult extends Result
{
    /** @var string The internal transaction id. */
    protected $transactionId;

    /**
     * Create a new pre transfer result.
     *
     * @param  bool $isSuccessful
     * @param  string $transactionId
     * @return void
     */
    public function __construct(bool $isSuccessful, string $transactionId)
    {
        parent::__construct($isSuccessful);

        $this->transactionId = $transactionId;
    }

    /**
     * @param string $transactionId
     * @return $this
     */
    public function setTransactionId(string $transactionId)
    {
        $this->transactionId = $transactionId;

        return $this;
    }

    /**
     * @return bool
     */
    public function transactionId()
    {
        return $this->transactionId;
    }
}
