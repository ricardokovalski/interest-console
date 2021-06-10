<?php

namespace RicardoKovalski\Interest\Console;

use RicardoKovalski\Interest\Console\Util;
use Symfony\Component\Console\Application as BaseApplication;

/**
 * Class Application
 * @package RicardoKovalski\Interest\Console
 */
class Application extends BaseApplication
{
    /**
     * Application constructor.
     */
    public function __construct()
    {
        Util\ErrorHandler::register();
        parent::__construct('ricardokovalski/interest-console', '1.0');
    }
}
