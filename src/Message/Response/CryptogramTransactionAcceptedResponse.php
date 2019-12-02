<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Response;

use AvtoDev\CloudPayments\Message\Response\Model\CryptogramTransactionAcceptedModel;
use AvtoDev\CloudPayments\Message\Response\Model\ModelInterface;

/**
 * @method CryptogramTransactionAcceptedModel getModel()
 *
 * @see https://developers.cloudpayments.ru/#oplata-po-kriptogramme
 */
class CryptogramTransactionAcceptedResponse extends AbstractResponse
{
    /**
     * {@inheritDoc}
     */
    public function createModel(): ModelInterface
    {
        return new CryptogramTransactionAcceptedModel;
    }
}
