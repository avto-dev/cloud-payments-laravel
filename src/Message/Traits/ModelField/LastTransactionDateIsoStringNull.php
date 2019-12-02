<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait LastTransactionDateIsoStringNull
{
    /** @var string|null */
    protected $last_transaction_date_iso;

    /**
     * @return string|null
     */
    public function getLastTransactionDateIso(): ?string
    {
        return $this->last_transaction_date_iso;
    }

    /**
     * @param string|null $last_transaction_date_iso
     *
     * @return $this
     */
    public function setLastTransactionDateIso(?string $last_transaction_date_iso): self
    {
        $this->last_transaction_date_iso = $last_transaction_date_iso;

        return $this;
    }
}
