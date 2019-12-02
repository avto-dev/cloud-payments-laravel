<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait CurrencyCodeInt
{
    /** @var int */
    protected $currency_code;

    /**
     * @return int
     */
    public function getCurrencyCode(): int
    {
        return $this->currency_code;
    }

    /**
     * @param int $currency_code
     *
     * @return $this
     */
    public function setCurrencyCode(int $currency_code): self
    {
        $this->currency_code = $currency_code;

        return $this;
    }
}
