<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Strategy;

use AvtoDev\CloudPayments\Message\Response\InvalidRequestResponse;
use AvtoDev\CloudPayments\Message\Response\SubscriptionsResponse;
use AvtoDev\CloudPayments\Message\Strategy\Specification\InvalidRequestSpecification;
use AvtoDev\CloudPayments\Message\Strategy\Specification\SubscriptionsSpecification;

/**
 * @see https://developers.cloudpayments.ru/#poisk-podpisok
 */
class SubscriptionsStrategy extends AbstractStrategy
{
    protected $specifications = [
        InvalidRequestSpecification::class  => InvalidRequestResponse::class,
        SubscriptionsSpecification::class   => SubscriptionsResponse::class,
    ];
}
