<?php

namespace RicardoKovalski\Interest\Console\Util;

use ErrorException;

/**
 * Class ErrorHandler
 * @package RicardoKovalski\Interest\Console\Util
 */
final class ErrorHandler
{
    /**
     * @param $level
     * @param $message
     * @param $file
     * @param $line
     * @throws ErrorException
     */
    public static function handle($level, $message, $file, $line)
    {
        if (! error_reporting()) {
            return;
        }

        throw new ErrorException($message, 0, $level, $file, $line);
    }

    public static function register()
    {
        set_error_handler(array(__CLASS__, 'handle'));
    }
}
