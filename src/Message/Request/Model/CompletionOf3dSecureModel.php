<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Request\Model;

use AvtoDev\CloudPayments\Message\Traits\ModelField\PaResString;
use AvtoDev\CloudPayments\Message\Traits\ModelField\TransactionIdInt;

/**
 * @see https://developers.cloudpayments.ru/#obrabotka-3-d-secure
 */
class CompletionOf3dSecureModel extends AbstractModel
{
    use TransactionIdInt,
        PaResString;

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return [
            'TransactionId' => $this->getTransactionId(),
            'PaRes'         => $this->getPaRes(),
        ];
    }
}
