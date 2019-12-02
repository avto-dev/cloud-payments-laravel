<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait CustomerReceiptStringNull
{
    /** @var string|null */
    protected $customer_receipt;

    /**
     * @return string|null
     */
    public function getCustomerReceipt(): ?string
    {
        return $this->customer_receipt;
    }

    /**
     * @param string|null $customer_receipt
     *
     * @return $this
     */
    public function setCustomerReceipt(?string $customer_receipt): self
    {
        $this->customer_receipt = $customer_receipt;

        return $this;
    }
}
