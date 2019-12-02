<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Response\Model;

use AvtoDev\CloudPayments\Message\Traits\ModelField\TransactionIdInt;

/**
 * @see https://developers.cloudpayments.ru/#vozvrat-deneg
 */
class RefundPaymentModel extends AbstractModel
{
    use TransactionIdInt;

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return [
            'TransactionId' => $this->getTransactionId(),
        ];
    }
}
