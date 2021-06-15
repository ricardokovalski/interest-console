<?php

namespace RicardoKovalski\Interest\Console\Tests\Command;

use PHPUnit\Framework\TestCase;
use RicardoKovalski\Interest\Console\Command\CalculateCommand;
use RicardoKovalski\Interest\Console\Tests\Util\TestOutput;
use Symfony\Component\Console\Input\StringInput;

class CalculateCommandTest extends TestCase
{
    protected $execute;

    protected function setUp()
    {
        parent::setUp();

        $this->execute = new \ReflectionMethod('RicardoKovalski\\Interest\\Console\\Command\\CalculateCommand', 'execute');
        $this->execute->setAccessible(true);
    }

    public function testConfigure()
    {
        $command = new CalculateCommand();

        $this->assertEquals('calculate', $command->getName());
        $this->assertEquals('Calculate a interest', $command->getDescription());
    }

    public function testExample()
    {
        $command = new CalculateCommand();

        $input = new StringInput('Financial');


        $input->bind($command->getDefinition());

        $output = new TestOutput();

        $this->execute->invoke($command, $input, $output);
        var_dump($output->messages);die("AQUI");

        $this->assertCount(1, $output->messages);

        echo "<pre>";
        var_dump($output->messages[0]);
        die("123");

        //$this->assertTrue(Uuid::isValid($output->messages[0]));
        //$this->assertEquals(1, Uuid::fromString($output->messages[0])->getVersion());
    }

}
