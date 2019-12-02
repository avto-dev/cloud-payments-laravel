<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Request\Model;

use AvtoDev\CloudPayments\Message\Traits\ModelField\AmountFloat;
use AvtoDev\CloudPayments\Message\Traits\ModelField\JsonDataStringNull;
use AvtoDev\CloudPayments\Message\Traits\ModelField\TransactionIdInt;

/**
 * @see https://developers.cloudpayments.ru/#vozvrat-deneg
 */
class RefundPaymentModel extends AbstractModel
{
    use TransactionIdInt,
        AmountFloat,
        JsonDataStringNull;

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return [
            'TransactionId' => $this->getTransactionId(),
            'Amount'        => $this->getAmount(),
            'JsonData'      => $this->getJsonData(),
        ];
    }
}
