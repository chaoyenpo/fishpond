<?php

namespace Gamesmkt\Fishpond\Result;

class LoginResult extends Result
{
    /** @var string Game Login Url. */
    protected $loginURL;

    /**
     * Create a new login result.
     *
     * @param  bool $isSuccessful
     * @param  string $loginURL
     * @return void
     */
    public function __construct(bool $isSuccessful, string $loginURL)
    {
        parent::__construct($isSuccessful);

        $this->loginURL = $loginURL;
    }

    /**
     * @param string $loginURL
     * @return $this
     */
    public function setLoginUrl(string $loginURL)
    {
        $this->loginURL = $loginURL;

        return $this;
    }

    /**
     * @return bool
     */
    public function loginUrl()
    {
        return $this->loginURL;
    }
}
