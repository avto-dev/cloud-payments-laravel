<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Message\Traits\ModelField;

use AvtoDev\CloudPayments\Message\Traits\ModelField\ReasonCodeInt;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

/**
 * @group unit
 */
class ReasonCodeIntTest extends TestCase
{
    protected $class;

    /** @var \Faker\Generator */
    protected $facker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->facker = Factory::create();

        $this->class = new class {
            use ReasonCodeInt;
        };
    }

    public function test()
    {
        $this->class->setReasonCode($some = $this->facker->randomNumber());

        $this->assertSame($some, $this->class->getReasonCode());
    }
}
