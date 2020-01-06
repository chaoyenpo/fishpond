<?php

namespace Gamesmkt\Fishpond\Result;

use Illuminate\Support\Collection;

class BetRecordResult extends Result
{
    /** @var  \Illuminate\Support\Collection|array|mixed */
    protected $betRecords;

    /**
     * Create a new transfer result.
     *
     * @param  bool $isSuccessful
     * @param  \Illuminate\Support\Collection|array|mixed $betRecords
     * @return void
     */
    public function __construct(bool $isSuccessful, $betRecords)
    {
        parent::__construct($isSuccessful);

        $this->betRecords = $betRecords;
    }

    /**
     * @param  \Illuminate\Support\Collection|array|mixed $betRecords
     * @return $this
     */
    public function setBetRecords(string $betRecords)
    {
        $this->betRecords = $betRecords;

        return $this;
    }

    /**
     * @return \Illuminate\Support\Collection|array|mixed
     */
    public function betRecords()
    {
        return $this->betRecords ?? new Collection();
    }
}
