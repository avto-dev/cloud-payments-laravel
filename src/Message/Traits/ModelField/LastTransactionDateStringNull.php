<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait LastTransactionDateStringNull
{
    /** @var string|null */
    protected $last_transaction_date;

    /**
     * @return string|null
     */
    public function getLastTransactionDate(): ?string
    {
        return $this->last_transaction_date;
    }

    /**
     * @param string|null $last_transaction_date
     *
     * @return $this
     */
    public function setLastTransactionDate(?string $last_transaction_date): self
    {
        $this->last_transaction_date = $last_transaction_date;

        return $this;
    }
}
