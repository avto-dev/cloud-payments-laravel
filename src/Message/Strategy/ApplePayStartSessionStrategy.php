<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Strategy;

use AvtoDev\CloudPayments\Message\Response\InvalidRequestResponse;
use AvtoDev\CloudPayments\Message\Response\ApplePayStartSessionResponse;
use AvtoDev\CloudPayments\Message\Strategy\Specification\InvalidRequestSpecification;
use AvtoDev\CloudPayments\Message\Strategy\Specification\ApplePayStartSessionCorrectSpecification;

/**
 * @see https://developers.cloudpayments.ru/#zapusk-sessii-dlya-oplaty-cherez-apple-pay
 */
class ApplePayStartSessionStrategy extends AbstractStrategy
{
    protected $specifications = [
        InvalidRequestSpecification::class              => InvalidRequestResponse::class,
        ApplePayStartSessionCorrectSpecification::class => ApplePayStartSessionResponse::class,
    ];
}
