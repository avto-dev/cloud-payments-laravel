<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Message\Traits\ModelField;

use AvtoDev\CloudPayments\Message\Traits\ModelField\RequireConfirmationBoolNull;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

/**
 * @group unit
 */
class RequireConfirmationBoolNullTest extends TestCase
{
    protected $class;

    /** @var \Faker\Generator */
    protected $facker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->facker = Factory::create();

        $this->class = new class {
            use RequireConfirmationBoolNull;
        };
    }

    public function test()
    {
        $this->class->setRequireConfirmation($some = $this->facker->boolean);

        $this->assertSame($some, $this->class->isRequireConfirmation());
    }
}
