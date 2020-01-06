<?php

namespace Gamesmkt\Fishpond\Result;

class PreCreatePlayerResult extends Result
{
    /** @var string The internal player username. */
    protected $username;

    /**
     * Create a new pre create player result.
     *
     * @param  bool $isSuccessful
     * @param  string $username
     * @return void
     */
    public function __construct(bool $isSuccessful, string $username)
    {
        parent::__construct($isSuccessful);

        $this->username = $username;
    }

    /**
     * @param string $username
     * @return $this
     */
    public function setUsername(string $username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return bool
     */
    public function username()
    {
        return $this->username;
    }
}
