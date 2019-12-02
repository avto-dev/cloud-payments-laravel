<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Request\Model;

use AvtoDev\CloudPayments\Message\Traits\ModelField\TransactionIdInt;

/**
 * @see https://developers.cloudpayments.ru/#otmena-oplaty
 */
class CancelPaymentModel extends AbstractModel
{
    use TransactionIdInt;

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'TransactionId' => $this->getTransactionId(),
        ];
    }
}
