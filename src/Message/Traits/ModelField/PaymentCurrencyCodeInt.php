<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait PaymentCurrencyCodeInt
{
    /** @var int */
    protected $payment_currency_code;

    /**
     * @return int
     */
    public function getPaymentCurrencyCode(): int
    {
        return $this->payment_currency_code;
    }

    /**
     * @param int $payment_currency_code
     *
     * @return $this
     */
    public function setPaymentCurrencyCode(int $payment_currency_code): self
    {
        $this->payment_currency_code = $payment_currency_code;

        return $this;
    }
}
