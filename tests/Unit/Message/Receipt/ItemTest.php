<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Message\Receipt;

use AvtoDev\CloudPayments\Message\Receipt\Item;
use AvtoDev\CloudPayments\Message\Reference\PaymentObject;
use AvtoDev\CloudPayments\Message\Reference\Vat;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

/**
 * @group  unit
 * @group  item
 * @covers \AvtoDev\CloudPayments\Message\Receipt\Item
 */
class ItemTest extends TestCase
{
    /** @var \Faker\Generator */
    protected $faker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->faker = Factory::create();
    }

    public function test()
    {
        $item = new Item;
        $item
            ->setLabel($label = $this->faker->sentence)
            ->setPrice($price = $this->faker->randomFloat())
            ->setQuantity($quantity = $this->faker->randomFloat())
            ->setAmount($amount = $this->faker->randomFloat())
            ->setVat($vat = $this->faker->randomElement([
                Vat::NDS_0,
                Vat::NDS_10,
                Vat::NDS_10_110,
                Vat::NDS_20,
                Vat::NDS_20_120,
                Vat::NO_NDS,
            ]))
            ->setMethod($method = $this->faker->randomElement([
                PaymentObject::UNKNOWN,
                PaymentObject::COMMODITY,
                PaymentObject::EXCISED_COMMODITY,
                PaymentObject::JOB,
                PaymentObject::SERVICE,
                PaymentObject::GAMBLING_BET,
                PaymentObject::GAMBLING_WIN,
                PaymentObject::LOTTERY_TICKET,
                PaymentObject::LOTTERY_WIN,
                PaymentObject::RID_ACCESS,
                PaymentObject::PAYMENT,
                PaymentObject::AGENT_REWARD,
                PaymentObject::COMPOSITE,
                PaymentObject::ANOTHER,
            ]))
            ->setObject($object = $this->faker->randomNumber())
            ->setMeasurementUnit($measurement_unit = $this->faker->sentence);

        $expected = \array_filter([
            'label'           => $label,
            'price'           => $price,
            'quantity'        => $quantity,
            'amount'          => $amount,
            'vat'             => $vat,
            'method'          => $method,
            'object'          => $object,
            'measurementUnit' => $measurement_unit,
        ]);

        $this->assertSame($expected, $item->toArray());
    }
}
