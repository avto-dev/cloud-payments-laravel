<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Message\Traits\ModelField;

use AvtoDev\CloudPayments\Message\Traits\ModelField\ValidationUrlString;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

/**
 * @group unit
 */
class ValidationUrlStringTest extends TestCase
{
    protected $class;

    /** @var \Faker\Generator */
    protected $facker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->facker = Factory::create();

        $this->class = new class {
            use ValidationUrlString;
        };
    }

    public function test()
    {
        $this->class->setValidationUrl($some = $this->facker->sentence);

        $this->assertSame($some, $this->class->getValidationUrl());
    }
}
