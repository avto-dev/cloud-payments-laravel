<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Strategy;

use AvtoDev\CloudPayments\Message\Response\InvalidRequestResponse;
use AvtoDev\CloudPayments\Message\Response\TokenTransactionAcceptedResponse;
use AvtoDev\CloudPayments\Message\Response\TokenTransactionRejectedResponse;
use AvtoDev\CloudPayments\Message\Strategy\Specification\InvalidRequestSpecification;
use AvtoDev\CloudPayments\Message\Strategy\Specification\TransactionAcceptedSpecification;
use AvtoDev\CloudPayments\Message\Strategy\Specification\TransactionRejectedSpecification;

/**
 * @see https://developers.cloudpayments.ru/#oplata-po-tokenu-rekarring
 */
class TokenPaymentStrategy extends AbstractStrategy
{
    /** @var array */
    protected $specifications = [
        InvalidRequestSpecification::class      => InvalidRequestResponse::class,
        TransactionRejectedSpecification::class => TokenTransactionRejectedResponse::class,
        TransactionAcceptedSpecification::class => TokenTransactionAcceptedResponse::class,
    ];
}
