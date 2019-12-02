<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Message\Traits\ModelField;

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use AvtoDev\CloudPayments\Message\Traits\ModelField\IpLongitudeFloatNull;

/**
 * @group unit
 */
class IpLongitudeFloatNullTest extends TestCase
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
            use IpLongitudeFloatNull;
        };
    }

    public function test()
    {
        $this->class->setIpLongitude($some = $this->facker->randomFloat());

        $this->assertSame($some, $this->class->getIpLongitude());
    }
}
