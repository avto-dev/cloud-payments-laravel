<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait InvoiceIdStringNull
{
    /** @var string|null */
    protected $invoice_id;

    /**
     * @return string|null
     */
    public function getInvoiceId(): ?string
    {
        return $this->invoice_id;
    }

    /**
     * @param string|null $invoice_id
     *
     * @return $this
     */
    public function setInvoiceId(?string $invoice_id): self
    {
        $this->invoice_id = $invoice_id;

        return $this;
    }
}
