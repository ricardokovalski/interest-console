<?php

namespace RicardoKovalski\Interest\Console\Util;

/**
 * Class Types
 * @package RicardoKovalski\Interest\Console\Util
 */
class Types
{
    const COMPOUND = 'Compound';

    const FINANCIAL = 'Financial';

    const SIMPLE = 'Simple';

    /**
     * @return string[]
     */
    public static function all()
    {
        return [
            self::COMPOUND => self::COMPOUND,
            self::FINANCIAL => self::FINANCIAL,
            self::SIMPLE => self::SIMPLE,
        ];
    }
}

