<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Message\Receipt;

use Faker\Factory;
use AvtoDev\CloudPayments\Message\Receipt\Item;
use AvtoDev\CloudPayments\Message\Receipt\Receipt;
use AvtoDev\CloudPayments\Message\Reference\PaymentObject;
use AvtoDev\CloudPayments\Message\Reference\TaxationSystem;
use AvtoDev\CloudPayments\Message\Reference\Vat;
use PHPUnit\Framework\TestCase;

class ReceiptTest extends TestCase
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
        $item1 = $this->createMock(Item::class);
        $item2 = $this->createMock(Item::class);

        $receipt = new Receipt;

        $receipt
            ->setItems([
                $item1,
            ])
            ->setCalculationPlace($calculation_place = $this->faker->sentence)
            ->setTaxationSystem($taxation_system = $this->faker->randomElement([
                TaxationSystem::OSN,
                TaxationSystem::ENVD,
                TaxationSystem::ESHN,
                TaxationSystem::PATENT,
                TaxationSystem::USN_INCOME,
                TaxationSystem::USN_INCOME_OUTCOME,
            ]))
            ->setEmail($email = $this->faker->sentence)
            ->setPhone($phone = $this->faker->sentence)
            ->setIsBso($is_bso = $this->faker->boolean)
            ->setElectronicAmount($electronic_amount = $this->faker->randomFloat())
            ->setAdvancePaymentAmount($advance_payment_amount = $this->faker->randomFloat())
            ->setCreditAmount($credit_amount = $this->faker->randomFloat())
            ->setProvisionAmount($provision_amount = $this->faker->randomFloat())
            ->addItem($item2);

        $expected = \array_filter([
            'Items'            => [
            ],
            'calculationPlace' => $calculation_place,
            'taxationSystem'   => $taxation_system,
            'email'            => $email,
            'phone'            => $phone,
            'isBso'            => $is_bso,
            'amounts'          => [
                'electronic'     => \number_format((float) $electronic_amount, 2, '.', ''),
                'advancePayment' => \number_format((float) $advance_payment_amount, 2, '.', ''),
                'credit'         => \number_format((float) $credit_amount, 2, '.', ''),
                'provision'      => \number_format((float) $provision_amount, 2, '.', ''),
            ],
        ]);

        $this->assertSame($expected, $receipt->toArray());
    }
}
