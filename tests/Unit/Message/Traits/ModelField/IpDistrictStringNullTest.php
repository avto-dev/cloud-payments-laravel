<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Message\Traits\ModelField;

use AvtoDev\CloudPayments\Message\Traits\ModelField\IpDistrictStringNull;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

/**
 * @group unit
 */
class IpDistrictStringNullTest extends TestCase
{
    protected $class;

    /** @var \Faker\Generator */
    protected $facker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->facker = Factory::create();

        $this->class = new class {
            use IpDistrictStringNull;
        };
    }

    public function test()
    {
        $this->class->setIpDistrict($some = $this->facker->sentence);

        $this->assertSame($some, $this->class->getIpDistrict());
    }
}
