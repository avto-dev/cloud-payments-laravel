<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Receipt;

use Illuminate\Support\Str;
use AvtoDev\Tests\AbstractTestCase;
use AvtoDev\CloudPayments\Receipts\Item;
use AvtoDev\CloudPayments\Receipts\Receipt;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(Receipt::class)]
class ReceiptTest extends AbstractTestCase
{
    /**
     * @var Receipt
     */
    protected $receipt;

    protected function setUp(): void
    {
        parent::setUp();
        $this->receipt = new Receipt;
    }

    public function testSetters(): void
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

    public function testItemsToArray(): void
    {
        $item = new Item;

        $item->setLabel($label = Str::random());

        $this->receipt->addItem($item);

        $receipt_array = $this->receipt->toArray();

        $this->assertArrayHasKey('Items', $receipt_array);
        $this->assertCount(1, $receipt_array['Items']);
        $this->assertSame($label, $receipt_array['Items'][0]['label']);
    }

    public function testAmounts(): void
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

            $this->receipt->{'set' . $method_postfix}($value);

            $this->assertArrayHasKey($property_name, $this->receipt->toArray()['amounts']);

            $this->assertSame(
                \number_format((float) $value, 2, '.', ''),
                $this->receipt->toArray()['amounts'][$property_name]
            );
        }
    }

    protected function simpleFieldTest(string $property_name, $value): void
    {
        $method_postfix = Str::studly($property_name);

        $this->assertTrue(\method_exists($this->receipt, 'set' . $method_postfix));

        $this->receipt->{'set' . $method_postfix}($value);

        $this->assertArrayHasKey($property_name, $this->receipt->toArray());

        $this->assertSame($value, $this->receipt->toArray()[$property_name]);
    }
}
