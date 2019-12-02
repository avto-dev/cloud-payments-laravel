<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Request;

use AvtoDev\CloudPayments\Message\Request\Model\GetSubscriptionModel;
use AvtoDev\CloudPayments\Message\Request\Model\ModelInterface;
use AvtoDev\CloudPayments\Message\Response\InvalidRequestResponse;
use AvtoDev\CloudPayments\Message\Response\SubscriptionResponse;
use AvtoDev\CloudPayments\Message\Strategy\StrategyInterface;
use AvtoDev\CloudPayments\Message\Strategy\SubscriptionStrategy;

/**
 * @method GetSubscriptionModel getModel()
 * @method InvalidRequestResponse|SubscriptionResponse send()
 * @method static GetSubscriptionRequest create()
 *
 * @see https://developers.cloudpayments.ru/#zapros-informatsii-o-podpiske
 */
class GetSubscriptionRequest extends AbstractRequest
{
    /**
     * {@inheritdoc}
     */
    public function createModel(): ModelInterface
    {
        return new GetSubscriptionModel;
    }

    /**
     * {@inheritdoc}
     */
    public function getStrategy(): StrategyInterface
    {
        return new SubscriptionStrategy;
    }

    /**
     * {@inheritdoc}
     */
    protected function getRelativeUrl(): string
    {
        return '/subscriptions/get';
    }
}
