<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Response;

use AvtoDev\CloudPayments\Message\Response\Model\CryptogramTransactionRejectedModel;
use AvtoDev\CloudPayments\Message\Response\Model\ModelInterface;

/**
 * @method CryptogramTransactionRejectedModel getModel()
 *
 * @see https://developers.cloudpayments.ru/#oplata-po-kriptogramme
 */
class CryptogramTransactionRejectedResponse extends AbstractResponse
{
    /**
     * {@inheritdoc}
     */
    public function createModel(): ModelInterface
    {
        return new CryptogramTransactionRejectedModel;
    }
}
