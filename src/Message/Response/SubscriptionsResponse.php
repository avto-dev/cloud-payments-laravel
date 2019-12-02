<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Response;

use AvtoDev\CloudPayments\Message\Response\Model\ModelInterface;
use AvtoDev\CloudPayments\Message\Response\Model\SubscriptionModel;
use AvtoDev\CloudPayments\Message\Response\Model\SubscriptionsModel;

/**
 * @method SubscriptionModel[]|SubscriptionsModel getModel()
 *
 * @see https://developers.cloudpayments.ru/#poisk-podpisok
 */
class SubscriptionsResponse extends AbstractResponse
{
    /**
     * {@inheritdoc}
     */
    public function createModel(): ModelInterface
    {
        return new SubscriptionsModel;
    }
}
