<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\ValueObjects;

use AvtoDev\CloudPayments\Receipts\Receipt;
use AvtoDev\CloudPayments\References\Interval;

/**
 * @link https://developers.cloudpayments.ru/#rekurrentnye-platezhi-podpiska
 */
class SubscriptionParams
{
    private ?int $maximum_payments_number;
    private ?float $amount;

    private ?\DateTimeInterface $start_date;

    private ?Receipt $receipt;

    public function __construct(
        private readonly string $interval,
        private readonly int $period,
    ) {
        if (! \in_array($this->interval, Interval::INTERVALS_LIST, true)) {
            throw new \InvalidArgumentException('Interval must be one of: ' . \implode(', ', Interval::INTERVALS_LIST));
        }

        if ($this->period <= 0) {
            throw new \InvalidArgumentException('Period value must be greater than 0');
        }

        $this->maximum_payments_number = null;
        $this->amount                  = null;
        $this->start_date              = null;
        $this->receipt                 = null;
    }

    public function setMaximumPaymentsNumber(int $payments_number): self
    {
        if ($payments_number <= 0) {
            throw new \InvalidArgumentException('Number of payments value must be greater than 0');
        }

        $this->maximum_payments_number = $payments_number;

        return $this;
    }

    public function setAmount(float $amount): self
    {
        if ($amount <= 0) {
            throw new \InvalidArgumentException('Amount value must be greater than 0');
        }

        $this->amount = $amount;

        return $this;
    }

    public function setStartDate(\DateTimeInterface $date): self
    {
        if ($date <= new \DateTime()) {
            throw new \InvalidArgumentException('Date value must be in the future');
        }

        $this->start_date = $date;

        return $this;
    }

    public function setReceipt(Receipt $receipt): self
    {
        $this->receipt = $receipt;

        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return \array_filter([
            'Interval'        => $this->interval,
            'Period'          => $this->period,
            'MaxPeriods'      => $this->maximum_payments_number,
            'Amount'          => $this->amount,
            'StartDate'       => $this->start_date?->format(\DateTimeInterface::RFC3339),
            'CustomerReceipt' => $this->receipt?->toArray(),
        ]);
    }
}