<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Message\Traits\ModelField;

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use AvtoDev\CloudPayments\Message\Traits\ModelField\SuccessfulTransactionsNumberInt;

/**
 * @group unit
 */
class SuccessfulTransactionsNumberIntTest extends TestCase
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
            use SuccessfulTransactionsNumberInt;
        };
    }

    public function test()
    {
        $this->class->setSuccessfulTransactionsNumber($some = $this->facker->randomNumber());

        $this->assertSame($some, $this->class->getSuccessfulTransactionsNumber());
    }
}
