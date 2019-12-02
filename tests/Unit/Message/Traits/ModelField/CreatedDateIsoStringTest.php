<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Message\Traits\ModelField;

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use AvtoDev\CloudPayments\Message\Traits\ModelField\CreatedDateIsoString;

/**
 * @group unit
 */
class CreatedDateIsoStringTest extends TestCase
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
            use CreatedDateIsoString;
        };
    }

    public function test()
    {
        $this->class->setCreatedDateIso($some = $this->facker->sentence);

        $this->assertSame($some, $this->class->getCreatedDateIso());
    }
}
