<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Response;

use AvtoDev\CloudPayments\Message\Response\Model\Cryptogram3dSecureAuthRequiredModel;
use AvtoDev\CloudPayments\Message\Response\Model\ModelInterface;

/**
 * @method Cryptogram3dSecureAuthRequiredModel getModel()
 *
 * @see https://developers.cloudpayments.ru/#oplata-po-kriptogramme
 */
class Cryptogram3dSecureAuthRequiredResponse extends AbstractResponse
{
    /**
     * {@inheritdoc}
     */
    public function createModel(): ModelInterface
    {
        return new Cryptogram3dSecureAuthRequiredModel;
    }
}
