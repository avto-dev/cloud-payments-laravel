<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Request;

use AvtoDev\CloudPayments\Message\Request\Model\CancelSubscriptionModel;
use AvtoDev\CloudPayments\Message\Request\Model\ModelInterface;
use AvtoDev\CloudPayments\Message\Response\InvalidRequestResponse;
use AvtoDev\CloudPayments\Message\Response\SuccessResponse;
use AvtoDev\CloudPayments\Message\Strategy\StrategyInterface;
use AvtoDev\CloudPayments\Message\Strategy\SuccessStrategy;

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
     * {@inheritdoc}
     */
    public function createModel(): ModelInterface
    {
        return new CancelSubscriptionModel;
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
        return '/subscriptions/cancel';
    }
}
