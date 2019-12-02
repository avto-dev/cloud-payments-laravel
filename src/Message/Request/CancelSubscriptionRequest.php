<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Request;

use AvtoDev\CloudPayments\Message\Request\Model\ModelInterface;
use AvtoDev\CloudPayments\Message\Response\SuccessResponse;
use AvtoDev\CloudPayments\Message\Strategy\StrategyInterface;
use AvtoDev\CloudPayments\Message\Strategy\SuccessStrategy;
use AvtoDev\CloudPayments\Message\Response\InvalidRequestResponse;
use AvtoDev\CloudPayments\Message\Request\Model\CancelSubscriptionModel;

/**
 * @method CancelSubscriptionModel getModel()
 * @method InvalidRequestResponse|SuccessResponse send()
 * @method static CancelSubscriptionRequest create()
 *
 * @see https://developers.cloudpayments.ru/#otmena-podpiski-na-rekurrentnye-platezhi
 */
class CancelSubscriptionRequest extends AbstractRequest
{
    /**
     * {@inheritDoc}
     */
    protected function getRelativeUrl(): string
    {
        return '/subscriptions/cancel';
    }

    /**
     * {@inheritDoc}
     */
    public function createModel(): ModelInterface
    {
        return new CancelSubscriptionModel;
    }

    /**
     * {@inheritDoc}
     */
    public function getStrategy(): StrategyInterface
    {
        return new SuccessStrategy;
    }
}
