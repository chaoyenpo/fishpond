<?php

namespace Gamesmkt\Fishpond;

use Gamesmkt\Fishpond\BetRecordInterface;

class BetRecord implements BetRecordInterface
{
    /** @var string */
    private $id;

    /** @var string */
    private $roundId;

    /**
     * @param string $id The record id
     * @param string $id The round id
     */
    public function __construct(string $id, string $roundId)
    {
        $this->id = $id;
        $this->roundId = $roundId;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getRoundId()
    {
        return $this->roundId;
    }

    public function __toString()
    {
        return $this->id;
    }
}
