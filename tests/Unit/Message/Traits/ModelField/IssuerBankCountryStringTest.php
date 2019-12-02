<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Message\Traits\ModelField;

use AvtoDev\CloudPayments\Message\Traits\ModelField\IssuerBankCountryString;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

/**
 * @group unit
 */
class IssuerBankCountryStringTest extends TestCase
{
    protected $class;

    /** @var \Faker\Generator */
    protected $facker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->facker = Factory::create();

        $this->class = new class {
            use IssuerBankCountryString;
        };
    }

    public function test()
    {
        $this->class->setIssuerBankCountry($some = $this->facker->sentence);

        $this->assertSame($some, $this->class->getIssuerBankCountry());
    }
}
