<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Request;

use AvtoDev\CloudPayments\Message\Request\Model\ModelInterface;
use AvtoDev\CloudPayments\Message\Request\Model\RefundPaymentModel;
use AvtoDev\CloudPayments\Message\Response\InvalidRequestResponse;
use AvtoDev\CloudPayments\Message\Response\RefundPaymentResponse;
use AvtoDev\CloudPayments\Message\Strategy\RefundPaymentStrategy;
use AvtoDev\CloudPayments\Message\Strategy\StrategyInterface;

/**
 * @method RefundPaymentModel getModel()
 * @method InvalidRequestResponse|RefundPaymentResponse send()
 * @method static RefundPaymentRequest create()
 *
 * @see https://developers.cloudpayments.ru/#vozvrat-deneg
 */
class RefundPaymentRequest extends AbstractRequest
{
    /**
     * {@inheritDoc}
     */
    protected function getRelativeUrl(): string
    {
        return '/payments/refund';
    }

    /**
     * {@inheritDoc}
     */
    public function createModel(): ModelInterface
    {
        return new RefundPaymentModel;
    }

    /**
     * {@inheritDoc}
     */
    public function getStrategy(): StrategyInterface
    {
        return new RefundPaymentStrategy;
    }
}
