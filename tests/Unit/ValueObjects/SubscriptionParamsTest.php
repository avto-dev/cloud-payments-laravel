<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\ValueObjects;

use AvtoDev\Tests\AbstractTestCase;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\Attributes\TestWith;
use AvtoDev\CloudPayments\Receipts\Receipt;
use PHPUnit\Framework\Attributes\CoversClass;
use AvtoDev\CloudPayments\References\Interval;
use AvtoDev\CloudPayments\ValueObjects\SubscriptionParams;
use Illuminate\Foundation\Testing\Concerns\InteractsWithExceptionHandling;

#[CoversClass(SubscriptionParams::class)]
class SubscriptionParamsTest extends AbstractTestCase
{
    use InteractsWithExceptionHandling;

    #[Test, TestDox('Checking correctly convert parameters object to array')]
    public function successfullyConvertToArray(): void
    {
        $interval           = $this->faker->randomElement(Interval::INTERVALS_LIST);
        $period             = $this->faker->randomDigitNotNull();
        $max_payment_number = $this->faker->randomDigitNotNull();
        $amount             = $this->faker->randomFloat(2, 1, 10000);
        $start_date         = $this->faker->dateTimeBetween('+1 day', '+1 year');
        $receipt            = new Receipt();

        $params = (new SubscriptionParams($interval, $period))
            ->setMaximumPaymentsNumber($max_payment_number)
            ->setAmount($amount)
            ->setStartDate($start_date)
            ->setReceipt($receipt);

        $this->assertSame($interval, $params->toArray()['Interval']);
        $this->assertSame($period, $params->toArray()['Period']);
        $this->assertSame($max_payment_number, $params->toArray()['MaxPeriods']);
        $this->assertSame($amount, $params->toArray()['Amount']);
        $this->assertSame($start_date->format(\DateTimeInterface::RFC3339), $params->toArray()['StartDate']);
        $this->assertSame($receipt->toArray(), $params->toArray()['CustomerReceipt']);
    }

    #[Test, TestDox('The `interval` value must be one of: Day, Week, Month')]
    public function throwExceptionWhenIntervalValueIsInvalid(): void
    {
        $this->assertThrows(
            fn () => new SubscriptionParams($this->faker->word(), $this->faker->randomDigitNotNull()),
            \InvalidArgumentException::class,
        );
    }

    #[
        Test,
        TestDox('The `period` parameter value must be greater than 0'),
        TestWith([0]),
        TestWith([-5])
    ]
    public function throwExceptionWhenPeriodValueIsInvalid(int $period): void
    {
        $this->assertThrows(
            fn () => new SubscriptionParams($this->faker->randomElement(Interval::INTERVALS_LIST), $period),
            \InvalidArgumentException::class,
        );
    }

    #[
        Test,
        TestDox('The `maximum_payments_number` parameter value must be greater than 0'),
        TestWith([0]),
        TestWith([-5])
    ]
    public function throwExceptionWhenMaximumPaymentsNumberValueIsInvalid(int $maximum_payments_number): void
    {
        $this->assertThrows(
            fn () => (new SubscriptionParams(
                $this->faker->randomElement(Interval::INTERVALS_LIST),
                $this->faker->randomDigitNotNull(),
            ))
                ->setMaximumPaymentsNumber($maximum_payments_number),
            \InvalidArgumentException::class,
        );
    }

    #[
        Test,
        TestDox('The amount parameter value must be greater than 0'),
        TestWith([0]),
        TestWith([-5.25])
    ]
    public function throwExceptionWhenAmountValueIsInvalid(float $amount): void
    {
        $this->assertThrows(
            fn () => (new SubscriptionParams(
                $this->faker->randomElement(Interval::INTERVALS_LIST),
                $this->faker->randomDigitNotNull(),
            ))
                ->setAmount($amount),
            \InvalidArgumentException::class,
        );
    }

    #[Test, TestDox('The `start_date` parameter value must be in the future')]
    public function throwExceptionWhenStartDateValueIsInvalid(): void
    {
        $this->assertThrows(
            fn () => (new SubscriptionParams(
                $this->faker->randomElement(Interval::INTERVALS_LIST),
                $this->faker->randomDigitNotNull(),
            ))
                ->setStartDate($this->faker->dateTimeBetween('-1 year')),
            \InvalidArgumentException::class,
        );
    }
}
