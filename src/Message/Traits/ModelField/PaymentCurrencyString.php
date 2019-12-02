<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait PaymentCurrencyString
{
    /** @var string */
    protected $payment_currency;

    /**
     * @return string
     */
    public function getPaymentCurrency(): string
    {
        return $this->payment_currency;
    }

    /**
     * @param string $payment_currency
     *
     * @return $this
     */
    public function setPaymentCurrency(string $payment_currency): self
    {
        $this->payment_currency = $payment_currency;

        return $this;
    }
}
