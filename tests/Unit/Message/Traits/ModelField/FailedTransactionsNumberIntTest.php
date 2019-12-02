<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Message\Traits\ModelField;

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use AvtoDev\CloudPayments\Message\Traits\ModelField\FailedTransactionsNumberInt;

/**
 * @group unit
 */
class FailedTransactionsNumberIntTest extends TestCase
{
    protected $class;

    /** @var \Faker\Generator */
    protected $facker;

    protected function setUp(): void
{
        parent::setUp();

        $this->facker = Factory::create();

        $this->class = new class
        {
            use FailedTransactionsNumberInt;
        };
    }

    public function test()
    {
        $this->class->setFailedTransactionsNumber($some = $this->facker->randomNumber());

        $this->assertSame($some, $this->class->getFailedTransactionsNumber());
    }
}
