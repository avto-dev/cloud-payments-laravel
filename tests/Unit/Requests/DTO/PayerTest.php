<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Requests\DTO;

use AvtoDev\CloudPayments\Requests\DTO\Payer;
use Illuminate\Support\Str;
use AvtoDev\Tests\AbstractTestCase;
use AvtoDev\CloudPayments\Receipts\Item;

/**
 * @covers \AvtoDev\CloudPayments\Requests\DTO\Payer
 */
class PayerTest extends AbstractTestCase
{
    /**
     * @var Payer
     */
    protected $payer;

    protected function setUp(): void
    {
        parent::setUp();

        $this->payer = new Payer;
    }

    public function testSetters(): void
    {
        $properties = [
            'FirstName'  => Str::random(),
            'LastName'   => Str::random(),
            'MiddleName' => Str::random(),
            'Birth'      => Str::random(),
            'Address'    => Str::random(),
            'Street'     => Str::random(),
            'City'       => Str::random(),
            'Country'    => Str::random(),
            'Phone'      => Str::random(),
            'Postcode'   => Str::random(),
        ];

        foreach ($properties as $key => $value) {
            $this->simpleFieldTest($key, $value, true);
        }
    }

    protected function simpleFieldTest(string $property_name, $value): void
    {
        $method_postfix = Str::studly($property_name);

        $this->assertTrue(\method_exists($this->payer, 'set' . $method_postfix));

        $this->payer->{'set' . $method_postfix}($value);

        $this->assertArrayHasKey($property_name, $this->payer->toArray());

        $this->assertSame($value, $this->payer->toArray()[$property_name]);
    }
}
