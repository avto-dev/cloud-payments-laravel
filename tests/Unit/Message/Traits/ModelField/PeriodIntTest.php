<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Message\Traits\ModelField;

use AvtoDev\CloudPayments\Message\Traits\ModelField\PeriodInt;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

/**
 * @group unit
 */
class PeriodIntTest extends TestCase
{
    protected $class;

    /** @var \Faker\Generator */
    protected $facker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->facker = Factory::create();

        $this->class = new class {
            use PeriodInt;
        };
    }

    public function test()
    {
        $this->class->setPeriod($some = $this->facker->randomNumber());

        $this->assertSame($some, $this->class->getPeriod());
    }
}
