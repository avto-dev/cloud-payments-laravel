<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Request;

use AvtoDev\CloudPayments\Message\Request\Model\ModelInterface;
use AvtoDev\CloudPayments\Message\Request\Model\UpdateSubscriptionModel;
use AvtoDev\CloudPayments\Message\Response\InvalidRequestResponse;
use AvtoDev\CloudPayments\Message\Response\SubscriptionResponse;
use AvtoDev\CloudPayments\Message\Strategy\StrategyInterface;
use AvtoDev\CloudPayments\Message\Strategy\SubscriptionStrategy;

/**
 * @method UpdateSubscriptionModel getModel()
 * @method InvalidRequestResponse|SubscriptionResponse send()
 * @method static UpdateSubscriptionRequest create()
 *
 * @see https://developers.cloudpayments.ru/#izmenenie-podpiski-na-rekurrentnye-platezhi
 */
class UpdateSubscriptionRequest extends AbstractRequest
{
    /**
     * {@inheritdoc}
     */
    public function createModel(): ModelInterface
    {
        return new UpdateSubscriptionModel;
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
        return '/subscriptions/update';
    }
}
