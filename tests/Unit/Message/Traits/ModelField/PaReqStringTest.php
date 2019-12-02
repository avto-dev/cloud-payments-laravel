<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Message\Traits\ModelField;

use AvtoDev\CloudPayments\Message\Traits\ModelField\PaReqString;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

/**
 * @group unit
 */
class PaReqStringTest extends TestCase
{
    protected $class;

    /** @var \Faker\Generator */
    protected $facker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->facker = Factory::create();

        $this->class = new class {
            use PaReqString;
        };
    }

    public function test()
    {
        $this->class->setPaReq($some = $this->facker->sentence);

        $this->assertSame($some, $this->class->getPaReq());
    }
}
