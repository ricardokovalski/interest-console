<?php

namespace RicardoKovalski\Interest\Console\Tests\Command;

use Exception;
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

    public function testExpectedExceptionWhenCommandFirstArgumentIsEmpty()
    {
        $command = new CalculateCommand();

        $input = new StringInput('');

        $input->bind($command->getDefinition());

        $output = new TestOutput();

        $this->expectException(Exception::class);

        $this->execute->invoke($command, $input, $output);
    }

    public function testExpectedExceptionWhenCommandFirstArgumentIsInvalid()
    {
        $command = new CalculateCommand();

        $input = new StringInput('XYZ');

        $input->bind($command->getDefinition());

        $output = new TestOutput();

        $this->expectException(Exception::class);

        $this->execute->invoke($command, $input, $output);
    }

    public function testCommandFirstArgumentIsFinancial()
    {
        $command = new CalculateCommand();

        $input = new StringInput('Financial');

        $input->bind($command->getDefinition());

        $output = new TestOutput();

        $this->execute->invoke($command, $input, $output);
        $this->assertCount(1, $output->messages);
        $this->assertEquals(0, $output->messages[0]);
    }

    public function testCommandSecondArgumentCompleted()
    {
        $command = new CalculateCommand();

        $input = new StringInput('Financial 2.99');

        $input->bind($command->getDefinition());

        $output = new TestOutput();

        $this->execute->invoke($command, $input, $output);
        $this->assertCount(1, $output->messages);
        $this->assertEquals(0, $output->messages[0]);
    }

    public function testCommandThirdArgumentCompleted()
    {
        $command = new CalculateCommand();

        $input = new StringInput('Financial 2.99 350.90');

        $input->bind($command->getDefinition());

        $output = new TestOutput();

        $this->execute->invoke($command, $input, $output);
        $this->assertCount(1, $output->messages);
        $this->assertEquals(350.9, $output->messages[0]);
    }

    public function testCommandFourteenArgumentCompleted()
    {
        $command = new CalculateCommand();

        $input = new StringInput('Financial 2.99 350.90 2');

        $input->bind($command->getDefinition());

        $output = new TestOutput();

        $this->execute->invoke($command, $input, $output);
        $this->assertCount(1, $output->messages);
        $this->assertEquals(366.71513681364, $output->messages[0]);
    }
}
