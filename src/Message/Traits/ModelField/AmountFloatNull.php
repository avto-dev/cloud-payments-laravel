<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait AmountFloatNull
{
    /** @var float|null */
    protected $amount;

    /**
     * @return float|null
     */
    public function getAmount(): ?float
    {
        return $this->amount;
    }

    /**
     * @param float|null $amount
     *
     * @return $this
     */
    public function setAmount(?float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }
}
