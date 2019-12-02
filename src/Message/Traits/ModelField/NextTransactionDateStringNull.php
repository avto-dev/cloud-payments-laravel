<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait NextTransactionDateStringNull
{
    /** @var string|null */
    protected $next_transaction_date;

    /**
     * @return string|null
     */
    public function getNextTransactionDate(): ?string
    {
        return $this->next_transaction_date;
    }

    /**
     * @param string|null $next_transaction_date
     *
     * @return $this
     */
    public function setNextTransactionDate(?string $next_transaction_date): self
    {
        $this->next_transaction_date = $next_transaction_date;

        return $this;
    }
}
