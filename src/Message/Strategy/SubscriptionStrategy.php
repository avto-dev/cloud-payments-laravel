<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Strategy;

use AvtoDev\CloudPayments\Message\Response\InvalidRequestResponse;
use AvtoDev\CloudPayments\Message\Response\SubscriptionResponse;
use AvtoDev\CloudPayments\Message\Strategy\Specification\InvalidRequestSpecification;
use AvtoDev\CloudPayments\Message\Strategy\Specification\SubscriptionSpecification;

/**
 * @see https://developers.cloudpayments.ru/#sozdanie-podpiski-na-rekurrentnye-platezhi
 * @see https://developers.cloudpayments.ru/#zapros-informatsii-o-podpiske
 * @see https://developers.cloudpayments.ru/#izmenenie-podpiski-na-rekurrentnye-platezhi
 */
class SubscriptionStrategy extends AbstractStrategy
{
    protected $specifications = [
        InvalidRequestSpecification::class => InvalidRequestResponse::class,
        SubscriptionSpecification::class   => SubscriptionResponse::class,
    ];
}
