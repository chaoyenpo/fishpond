<?php

namespace Gamesmkt\Fishpond;

use Illuminate\Support\Str;
use InvalidArgumentException;

class Util
{
    /**
     * Generate string.
     *
     * @param int $length
     *
     * @throws \InvalidArgumentException
     *
     * @return string pathinfo
     */
    public static function generateString($length = 32)
    {
        if ($length > 32) {
            throw new InvalidArgumentException('Length must be < 32.');
        }

        return strtoupper(substr(str_replace('-', '', (string) Str::uuid()), 0, $length));
    }
}
