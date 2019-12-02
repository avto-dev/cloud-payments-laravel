<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Message\Traits\ModelField;

use AvtoDev\CloudPayments\Message\Traits\ModelField\PaymentAmountFloat;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

/**
 * @group unit
 */
class PaymentAmountFloatTest extends TestCase
{
    protected $class;

    /** @var \Faker\Generator */
    protected $facker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->facker = Factory::create();

        $this->class = new class {
            use PaymentAmountFloat;
        };
    }

    public function test()
    {
        $this->class->setPaymentAmount($some = $this->facker->randomFloat());

        $this->assertSame($some, $this->class->getPaymentAmount());
    }
}
