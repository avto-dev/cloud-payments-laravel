<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Message\Traits\ModelField;

use AvtoDev\CloudPayments\Message\Traits\ModelField\NextTransactionDateStringNull;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

/**
 * @group unit
 */
class NextTransactionDateStringNullTest extends TestCase
{
    protected $class;

    /** @var \Faker\Generator */
    protected $facker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->facker = Factory::create();

        $this->class = new class {
            use NextTransactionDateStringNull;
        };
    }

    public function test()
    {
        $this->class->setNextTransactionDate($some = $this->facker->sentence);

        $this->assertSame($some, $this->class->getNextTransactionDate());
    }
}
