<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait FailedTransactionsNumberInt
{
    /** @var int */
    protected $failed_transactions_number;

    /**
     * @return int
     */
    public function getFailedTransactionsNumber(): int
    {
        return $this->failed_transactions_number;
    }

    /**
     * @param int $failed_transactions_number
     *
     * @return $this
     */
    public function setFailedTransactionsNumber(int $failed_transactions_number): self
    {
        $this->failed_transactions_number = $failed_transactions_number;

        return $this;
    }
}
