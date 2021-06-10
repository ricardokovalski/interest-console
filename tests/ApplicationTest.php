<?php

namespace RicardoKovalski\Interest\Console\Tests;

use PHPUnit\Framework\TestCase;
use RicardoKovalski\Interest\Console\Application;

class ApplicationTest extends TestCase
{
    public function testConstructor()
    {
        $app = new Application();

        restore_error_handler();

        $this->assertInstanceOf('RicardoKovalski\\Interest\\Console\\Application', $app);
        $this->assertEquals('ricardokovalski/interest-console', $app->getName());
        $this->assertEquals('1.0', $app->getVersion());
    }
}
