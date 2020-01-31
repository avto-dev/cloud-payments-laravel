<?php

namespace AvtoDev\CloudPayments\Requests\Traits;

use AvtoDev\CloudPayments\Receipts\Receipt;

/**
 * @see https://developers.cloudpayments.ru/#format-peredachi-dannyh-dlya-onlayn-cheka
 */
trait HasReceipt
{
    /**
     * @var Receipt
     */
    protected $receipt;

    /**
     * @return Receipt
     */
    public function getReceipt(): Receipt
    {
        return $this->receipt;
    }

    /**
     * @param Receipt $receipt
     *
     * @return $this
     */
    public function setReceipt(Receipt $receipt): self
    {
        $this->receipt = $receipt;

        return $this;
    }

    protected function getReceiptData(): array
    {
        $receipt_data = [];
        if ($this->receipt instanceof Receipt) {
            $receipt_data['cloudPayments']['customerReceipt'] = $this->receipt->toArray();
        }

        return $receipt_data;
    }
}
