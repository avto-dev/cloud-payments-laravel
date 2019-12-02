<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Strategy;

use AvtoDev\CloudPayments\Message\Response\SuccessResponse;
use AvtoDev\CloudPayments\Message\Response\InvalidRequestResponse;
use AvtoDev\CloudPayments\Message\Strategy\Specification\IsSuccessSpecification;
use AvtoDev\CloudPayments\Message\Strategy\Specification\InvalidRequestSpecification;

/**
 * @see https://developers.cloudpayments.ru/#testovyy-metod
 * @see https://developers.cloudpayments.ru/#otmena-sozdannogo-scheta
 */
class SuccessStrategy extends AbstractStrategy
{
    protected $specifications = [
        InvalidRequestSpecification::class => InvalidRequestResponse::class,
        IsSuccessSpecification::class      => SuccessResponse::class,
    ];
}
