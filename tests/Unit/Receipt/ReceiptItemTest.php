<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Receipt;

use Illuminate\Support\Str;
use AvtoDev\Tests\AbstractTestCase;
use AvtoDev\CloudPayments\Receipts\Item;

/**
 * @covers \AvtoDev\CloudPayments\Receipts\Item
 */
class ReceiptItemTest extends AbstractTestCase
{
    /**
     * @var Item
     */
    protected $receipt_item;

    protected function setUp(): void
    {
        parent::setUp();
        $this->receipt_item = new Item;
    }

    public function testGettersAndSetters(): void
    {
        $properties = [
            'label'           => Str::random(),
            'price'           => (float) random_int(0, 100),
            'quantity'        => (float) random_int(0, 100),
            'amount'          => (float) random_int(0, 100),
            'vat'             => random_int(0, 100),
            'method'          => random_int(0, 100),
            'object'          => random_int(0, 100),
            'measurementUnit' => Str::random(),
        ];

        foreach ($properties as $key => $value) {
            $this->simpleFieldTest($key, $value, true);
        }
    }

    protected function simpleFieldTest(string $property_name, $value): void
    {
        $method_postfix = Str::studly($property_name);

        $this->assertTrue(\method_exists($this->receipt_item, 'set' . $method_postfix));
        $this->assertTrue(\method_exists($this->receipt_item, 'get' . $method_postfix));

        $this->receipt_item->{'set' . $method_postfix}($value);

        $this->assertSame($value, $this->receipt_item->{'get' . $method_postfix}());

        $this->assertArrayHasKey($property_name, $this->receipt_item->toArray());

        $this->assertSame($value, $this->receipt_item->toArray()[$property_name]);
    }
}
