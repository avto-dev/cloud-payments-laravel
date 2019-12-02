<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Strategy;

use AvtoDev\CloudPayments\Message\Response\InvalidRequestResponse;
use AvtoDev\CloudPayments\Message\Response\RefundPaymentResponse;
use AvtoDev\CloudPayments\Message\Strategy\Specification\InvalidRequestSpecification;
use AvtoDev\CloudPayments\Message\Strategy\Specification\RefundPaymentSpecification;

/**
 * @see https://developers.cloudpayments.ru/#vozvrat-deneg
 */
class RefundPaymentStrategy extends AbstractStrategy
{
    protected $specifications = [
        InvalidRequestSpecification::class => InvalidRequestResponse::class,
        RefundPaymentSpecification::class  => RefundPaymentResponse::class,
    ];
}
