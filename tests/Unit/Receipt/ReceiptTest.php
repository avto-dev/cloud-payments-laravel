<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Receipt;

use AvtoDev\CloudPayments\Receipts\Item;
use AvtoDev\CloudPayments\Receipts\Receipt;
use AvtoDev\Tests\AbstractTestCase;
use Illuminate\Support\Str;

/**
 * @covers \AvtoDev\CloudPayments\Receipts\Receipt
 */
class ReceiptTest extends AbstractTestCase
{
    /**
     * @var Receipt
     */
    protected $receipt;

    public function setUp(): void
    {
        parent::setUp();
        $this->receipt = new Receipt;
    }

    public function testGettersAndSetters(): void
    {
        $properties = [
            'calculationPlace' => Str::random(),
            'taxationSystem'   => random_int(0, 100),
            'email'            => Str::random(),
            'phone'            => Str::random(),
            'isBso'            => (bool) random_int(0, 1),
        ];

        foreach ($properties as $key => $value) {
            $this->simpleFieldTest($key, $value, true);
        }
    }

    public function testReseiptItemsGettersAndSetters()
    {
        $this->assertSame([], $this->receipt->getItems());

        $item = new Item;

        $this->receipt->addItem($item);

        $this->assertSame([$item], $this->receipt->getItems());

        $this->receipt->setItems([]);

        $this->assertSame([], $this->receipt->getItems());

        $this->receipt->setItems([$item]);

        $this->assertSame([$item], $this->receipt->getItems());
    }

    public function testItemsToArray()
    {
        $item = new Item;

        $item->setLabel(Str::random());

        $items = [
            $item,
            new \stdClass,
        ];

        $this->receipt->setItems($items);

        $receipt_array = $this->receipt->toArray();

        $this->assertArrayHasKey('Items', $receipt_array);
        $this->assertCount(1, $receipt_array['Items']);
        $this->assertSame($item->getLabel(), $receipt_array['Items'][0]['label']);
    }

    public function testAmounts()
    {
        $this->assertArrayHasKey('amounts', $this->receipt->toArray());

        $amounts_fields = [
            'electronic'     => (float) random_int(0, 100),
            'advancePayment' => (float) random_int(0, 100),
            'credit'         => (float) random_int(0, 100),
            'provision'      => (float) random_int(0, 100),
        ];

        foreach ($amounts_fields as $property_name => $value) {
            $method_postfix = Str::studly($property_name) . 'Amount';

            $this->assertTrue(\method_exists($this->receipt, 'set' . $method_postfix));
            $this->assertTrue(\method_exists($this->receipt, 'get' . $method_postfix));

            $this->receipt->{'set' . $method_postfix}($value);

            $this->assertSame($value, $this->receipt->{'get' . $method_postfix}());

            $this->assertArrayHasKey($property_name, $this->receipt->toArray()['amounts']);

            $this->assertSame(\number_format((float) $value, 2, '.', ''),
                $this->receipt->toArray()['amounts'][$property_name]);

            $this->receipt->{'set' . $method_postfix}(null);

            $this->assertNull($this->receipt->{'get' . $method_postfix}());

            $this->assertSame('0.00', $this->receipt->toArray()['amounts'][$property_name]);
        }
    }

    protected function simpleFieldTest(string $property_name, $value): void
    {
        $method_postfix = Str::studly($property_name);

        $this->assertTrue(\method_exists($this->receipt, 'set' . $method_postfix));
        $this->assertTrue(\method_exists($this->receipt, 'get' . $method_postfix));

        $this->receipt->{'set' . $method_postfix}($value);

        $this->assertSame($value, $this->receipt->{'get' . $method_postfix}());

        $this->assertArrayHasKey($property_name, $this->receipt->toArray());

        $this->assertSame($value, $this->receipt->toArray()[$property_name]);

        $this->receipt->{'set' . $method_postfix}(null);

        $this->assertNull($this->receipt->{'get' . $method_postfix}());

        $this->assertArrayNotHasKey($property_name, $this->receipt->toArray());
    }
}
