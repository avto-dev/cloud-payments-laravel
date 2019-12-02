<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Request;

use AvtoDev\CloudPayments\Message\Request\Model\CancelPaymentModel;
use AvtoDev\CloudPayments\Message\Request\Model\ModelInterface;
use AvtoDev\CloudPayments\Message\Response\InvalidRequestResponse;
use AvtoDev\CloudPayments\Message\Response\SuccessResponse;
use AvtoDev\CloudPayments\Message\Strategy\StrategyInterface;
use AvtoDev\CloudPayments\Message\Strategy\SuccessStrategy;

/**
 * @method CancelPaymentModel getModel()
 * @method InvalidRequestResponse|SuccessResponse send()
 * @method static CancelPaymentRequest create()
 *
 * @see https://developers.cloudpayments.ru/#otmena-oplaty
 */
class CancelPaymentRequest extends AbstractRequest
{
    /**
     * {@inheritdoc}
     */
    public function createModel(): ModelInterface
    {
        return new CancelPaymentModel;
    }

    /**
     * {@inheritdoc}
     */
    public function getStrategy(): StrategyInterface
    {
        return new SuccessStrategy;
    }

    /**
     * {@inheritdoc}
     */
    protected function getRelativeUrl(): string
    {
        return '/payments/void';
    }
}
