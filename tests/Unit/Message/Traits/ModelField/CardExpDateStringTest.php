<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Message\Traits\ModelField;

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use AvtoDev\CloudPayments\Message\Traits\ModelField\CardExpDateString;

/**
 * @group unit
 */
class CardExpDateStringTest extends TestCase
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
            use CardExpDateString;
        };
    }

    public function test()
    {
        $this->class->setCardExpDate($some = $this->facker->sentence);

        $this->assertSame($some, $this->class->getCardExpDate());
    }
}
