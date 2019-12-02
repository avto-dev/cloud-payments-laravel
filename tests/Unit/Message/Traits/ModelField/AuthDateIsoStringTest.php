<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Message\Traits\ModelField;

use AvtoDev\CloudPayments\Message\Traits\ModelField\AuthDateIsoString;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

/**
 * @group unit
 */
class AuthDateIsoStringTest extends TestCase
{
    protected $class;

    /** @var \Faker\Generator */
    protected $facker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->facker = Factory::create();

        $this->class = new class {
            use AuthDateIsoString;
        };
    }

    public function test()
    {
        $this->class->setAuthDateIso($some = $this->facker->sentence);

        $this->assertSame($some, $this->class->getAuthDateIso());
    }
}
