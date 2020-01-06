<?php

namespace Gamesmkt\Fishpond;

use InvalidArgumentException;

class Type implements TypeInterface
{
    const TYPE_BET = 1;

    const TYPE_DONATE = 2;

    /** $var int */
    private $type;

    /**
     * @param int $type The record type
     */
    public function __construct(
        int $type
    ) {
        $this->assertType($type);

        $this->type = $type;
    }

    public function getType()
    {
        return $this->type;
    }

    private function assertMethod($type)
    {
        if (!is_int($type) || $type <= 0) {
            throw new InvalidArgumentException('Type must be an integer and more then zero.');
        }

        switch ($type) {
            case self::TYPE_BET:
                break;
            case self::TYPE_DONATE:
                break;
            default:
                throw new InvalidArgumentException("Not support [$type] type.");
        }
    }
}
