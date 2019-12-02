<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait PaymentAmountFloat
{
    /** @var float */
    protected $payment_amount;

    /**
     * @return float
     */
    public function getPaymentAmount(): float
    {
        return $this->payment_amount;
    }

    /**
     * @param float $payment_amount
     *
     * @return $this
     */
    public function setPaymentAmount(float $payment_amount): self
    {
        $this->payment_amount = $payment_amount;

        return $this;
    }
}
