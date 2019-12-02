<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait NextTransactionDateIsoStringNull
{
    /** @var string|null */
    protected $next_transaction_date_iso;

    /**
     * @return string|null
     */
    public function getNextTransactionDateIso(): ?string
    {
        return $this->next_transaction_date_iso;
    }

    /**
     * @param string|null $next_transaction_date_iso
     *
     * @return $this
     */
    public function setNextTransactionDateIso(?string $next_transaction_date_iso): self
    {
        $this->next_transaction_date_iso = $next_transaction_date_iso;

        return $this;
    }
}
