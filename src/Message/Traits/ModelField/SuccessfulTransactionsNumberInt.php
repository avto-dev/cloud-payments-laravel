<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait SuccessfulTransactionsNumberInt
{
    /** @var int */
    protected $successful_transactions_number;

    /**
     * @return int
     */
    public function getSuccessfulTransactionsNumber(): int
    {
        return $this->successful_transactions_number;
    }

    /**
     * @param int $successful_transactions_number
     *
     * @return $this
     */
    public function setSuccessfulTransactionsNumber(int $successful_transactions_number): self
    {
        $this->successful_transactions_number = $successful_transactions_number;

        return $this;
    }
}
