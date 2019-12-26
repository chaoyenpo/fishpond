<?php

namespace Gamesmkt\Fishpond\Results;

class Result
{
    /** @var bool */
    protected $isSuccessful;

    /**
     * Create a new result.
     *
     * @param  bool $isSuccessful
     * @return void
     */
    public function __construct(bool $isSuccessful)
    {
        $this->isSuccessful = $isSuccessful;
    }

    /**
     * @param bool $isSuccessful
     * @return $this
     */
    public function setIsSuccessful(bool $isSuccessful)
    {
        $this->isSuccessful = $isSuccessful;

        return $this;
    }

    /**
     * @return bool
     */
    public function isSuccessful()
    {
        return $this->isSuccessful;
    }
}
