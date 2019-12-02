<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Request;

use AvtoDev\CloudPayments\Message\Request\Model\ModelInterface;
use AvtoDev\CloudPayments\Message\Response\InvalidRequestResponse;
use AvtoDev\CloudPayments\Message\Response\SubscriptionResponse;
use AvtoDev\CloudPayments\Message\Strategy\StrategyInterface;
use AvtoDev\CloudPayments\Message\Strategy\SubscriptionStrategy;
use AvtoDev\CloudPayments\Message\Request\Model\UpdateSubscriptionModel;

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
     * {@inheritDoc}
     */
    protected function getRelativeUrl(): string
    {
        return '/subscriptions/update';
    }

    /**
     * {@inheritDoc}
     */
    public function createModel(): ModelInterface
    {
        return new UpdateSubscriptionModel;
    }

    /**
     * {@inheritDoc}
     */
    public function getStrategy(): StrategyInterface
    {
        return new SubscriptionStrategy;
    }
}
