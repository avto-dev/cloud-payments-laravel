<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Response;

use AvtoDev\CloudPayments\Message\Response\Model\ModelInterface;
use AvtoDev\CloudPayments\Message\Response\Model\RefundPaymentModel;

/**
 * @method RefundPaymentModel getModel()
 *
 * @see https://developers.cloudpayments.ru/#vozvrat-deneg
 */
class RefundPaymentResponse extends AbstractResponse
{
    /**
     * {@inheritDoc}
     */
    public function createModel(): ModelInterface
    {
        return new RefundPaymentModel;
    }
}
