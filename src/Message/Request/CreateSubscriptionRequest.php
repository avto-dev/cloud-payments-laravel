<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Request;

use AvtoDev\CloudPayments\Message\Request\Model\CreateSubscriptionModel;
use AvtoDev\CloudPayments\Message\Request\Model\ModelInterface;
use AvtoDev\CloudPayments\Message\Response\InvalidRequestResponse;
use AvtoDev\CloudPayments\Message\Response\SubscriptionResponse;
use AvtoDev\CloudPayments\Message\Strategy\StrategyInterface;
use AvtoDev\CloudPayments\Message\Strategy\SubscriptionStrategy;

/**
 * @method CreateSubscriptionModel getModel()
 * @method InvalidRequestResponse|SubscriptionResponse send()
 * @method static CreateSubscriptionRequest create()
 *
 * @see https://developers.cloudpayments.ru/#sozdanie-podpiski-na-rekurrentnye-platezhi
 */
class CreateSubscriptionRequest extends AbstractRequest
{
    /**
     * {@inheritdoc}
     */
    public function createModel(): ModelInterface
    {
        return new CreateSubscriptionModel;
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
        return '/subscriptions/create';
    }
}
