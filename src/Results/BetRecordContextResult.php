<?php

namespace Gamesmkt\Fishpond\Results;

class BetRecordContextResult extends BetRecordResult
{
    /** @var  string|null */
    protected $context;

    /**
     * Create a new transfer result.
     *
     * @param  bool $isSuccessful
     * @param  \Illuminate\Support\Collection|array|mixed $betRecords
     * @param  string|null $context
     * @return void
     */
    public function __construct(bool $isSuccessful, $betRecords, $context = null)
    {
        parent::__construct($isSuccessful, $betRecords);

        $this->context = $context;
    }

    /**
     * @param  string|null $context
     * @return $this
     */
    public function setContext(string $context)
    {
        $this->context = $context;

        return $this;
    }

    /**
     * @return string|null
     */
    public function context()
    {
        return $this->context;
    }
}
