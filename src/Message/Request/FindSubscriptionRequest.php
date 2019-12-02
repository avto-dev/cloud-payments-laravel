<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Request;

use AvtoDev\CloudPayments\Message\Request\Model\ModelInterface;
use AvtoDev\CloudPayments\Message\Response\InvalidRequestResponse;
use AvtoDev\CloudPayments\Message\Response\SubscriptionsResponse;
use AvtoDev\CloudPayments\Message\Strategy\StrategyInterface;
use AvtoDev\CloudPayments\Message\Strategy\SubscriptionsStrategy;
use AvtoDev\CloudPayments\Message\Request\Model\FindSubscriptionModel;

/**
 * @method FindSubscriptionModel getModel()
 * @method InvalidRequestResponse|SubscriptionsResponse send()
 * @method static FindSubscriptionRequest create()
 *
 * @see https://developers.cloudpayments.ru/#poisk-podpisok
 */
class FindSubscriptionRequest extends AbstractRequest
{
    /**
     * {@inheritDoc}
     */
    protected function getRelativeUrl(): string
    {
        return '/subscriptions/find';
    }

    /**
     * {@inheritDoc}
     */
    public function createModel(): ModelInterface
    {
        return new FindSubscriptionModel;
    }

    /**
     * {@inheritDoc}
     */
    public function getStrategy(): StrategyInterface
    {
        return new SubscriptionsStrategy;
    }
}
