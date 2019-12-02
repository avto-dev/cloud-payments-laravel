<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Response;

use AvtoDev\CloudPayments\Message\Response\Model\ModelInterface;
use AvtoDev\CloudPayments\Message\Response\Model\SubscriptionModel;

/**
 * @method SubscriptionModel getModel()
 *
 * @see https://developers.cloudpayments.ru/#sozdanie-podpiski-na-rekurrentnye-platezhi
 * @see https://developers.cloudpayments.ru/#zapros-informatsii-o-podpiske
 * @see https://developers.cloudpayments.ru/#izmenenie-podpiski-na-rekurrentnye-platezhi
 */
class SubscriptionResponse extends AbstractResponse
{
    /**
     * {@inheritdoc}
     */
    public function createModel(): ModelInterface
    {
        return new SubscriptionModel;
    }
}
