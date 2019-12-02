<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Response\Model;

use AvtoDev\CloudPayments\Message\Traits\ModelField\AcsUrlString;
use AvtoDev\CloudPayments\Message\Traits\ModelField\PaReqString;
use AvtoDev\CloudPayments\Message\Traits\ModelField\TransactionIdInt;

/**
 * @see https://developers.cloudpayments.ru/#oplata-po-kriptogramme
 */
class Cryptogram3dSecureAuthRequiredModel extends AbstractModel
{
    use TransactionIdInt,
        PaReqString,
        AcsUrlString;

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'TransactionId' => $this->getTransactionId(),
            'PaReq'         => $this->getPaReq(),
            'AcsUrl'        => $this->getAcsUrl(),
        ];
    }
}
