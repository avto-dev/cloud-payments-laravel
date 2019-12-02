<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Message\Traits\ModelField;

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use AvtoDev\CloudPayments\Message\Traits\ModelField\TransactionIdInt;

/**
 * @group unit
 */
class TransactionIdIntTest extends TestCase
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
            use TransactionIdInt;
        };
    }

    public function test()
    {
        $this->class->setTransactionId($some = $this->facker->randomNumber());

        $this->assertSame($some, $this->class->getTransactionId());
    }
}
