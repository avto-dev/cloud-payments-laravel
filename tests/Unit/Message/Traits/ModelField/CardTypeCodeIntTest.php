<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Message\Traits\ModelField;

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use AvtoDev\CloudPayments\Message\Traits\ModelField\CardTypeCodeInt;

/**
 * @group unit
 */
class CardTypeCodeIntTest extends TestCase
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
            use CardTypeCodeInt;
        };
    }

    public function test()
    {
        $this->class->setCardTypeCode($some = $this->facker->randomNumber());

        $this->assertSame($some, $this->class->getCardTypeCode());
    }
}
