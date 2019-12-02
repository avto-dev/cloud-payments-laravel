<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Message\Traits\ModelField;

use AvtoDev\CloudPayments\Message\Traits\ModelField\CardLastFourString;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

/**
 * @group unit
 */
class CardLastFourStringTest extends TestCase
{
    protected $class;

    /** @var \Faker\Generator */
    protected $facker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->facker = Factory::create();

        $this->class = new class {
            use CardLastFourString;
        };
    }

    public function test()
    {
        $this->class->setCardLastFour($some = $this->facker->sentence);

        $this->assertSame($some, $this->class->getCardLastFour());
    }
}
