<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Message\Traits\ModelField;

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use AvtoDev\CloudPayments\Message\Traits\ModelField\AmountFloat;

/**
 * @group unit
 */
class AmountFloatTest extends TestCase
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
            use AmountFloat;
        };
    }

    public function test()
    {
        $this->class->setAmount($some = $this->facker->randomFloat());

        $this->assertSame($some, $this->class->getAmount());
    }
}
