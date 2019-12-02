<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Message\Traits\ModelField;

use AvtoDev\CloudPayments\Message\Traits\ModelField\PeriodIntNull;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

/**
 * @group unit
 */
class PeriodIntNullTest extends TestCase
{
    protected $class;

    /** @var \Faker\Generator */
    protected $facker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->facker = Factory::create();

        $this->class = new class {
            use PeriodIntNull;
        };
    }

    public function test()
    {
        $this->class->setPeriod($some = $this->facker->randomNumber());

        $this->assertSame($some, $this->class->getPeriod());
    }
}
