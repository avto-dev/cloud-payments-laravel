<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Message\Traits\ModelField;

use AvtoDev\CloudPayments\Message\Traits\ModelField\CreatedDateString;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

/**
 * @group unit
 */
class CreatedDateStringTest extends TestCase
{
    protected $class;

    /** @var \Faker\Generator */
    protected $facker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->facker = Factory::create();

        $this->class = new class {
            use CreatedDateString;
        };
    }

    public function test()
    {
        $this->class->setCreatedDate($some = $this->facker->sentence);

        $this->assertSame($some, $this->class->getCreatedDate());
    }
}
