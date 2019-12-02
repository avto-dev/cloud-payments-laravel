<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Strategy;

use AvtoDev\CloudPayments\Message\Response\InvalidRequestResponse;
use AvtoDev\CloudPayments\Message\Response\CryptogramTransactionAcceptedResponse;
use AvtoDev\CloudPayments\Message\Response\CryptogramTransactionRejectedResponse;
use AvtoDev\CloudPayments\Message\Response\Cryptogram3dSecureAuthRequiredResponse;
use AvtoDev\CloudPayments\Message\Strategy\Specification\InvalidRequestSpecification;
use AvtoDev\CloudPayments\Message\Strategy\Specification\TransactionAcceptedSpecification;
use AvtoDev\CloudPayments\Message\Strategy\Specification\TransactionRejectedSpecification;
use AvtoDev\CloudPayments\Message\Strategy\Specification\Cryptogram3dSecureAuthRequiredSpecification;

/**
 * @see https://developers.cloudpayments.ru/#oplata-po-kriptogramme
 */
class CryptogramPaymentStrategy extends AbstractStrategy
{
    /** @var array */
    protected $specifications = [
        InvalidRequestSpecification::class                 => InvalidRequestResponse::class,
        Cryptogram3dSecureAuthRequiredSpecification::class => Cryptogram3dSecureAuthRequiredResponse::class,
        TransactionRejectedSpecification::class            => CryptogramTransactionRejectedResponse::class,
        TransactionAcceptedSpecification::class            => CryptogramTransactionAcceptedResponse::class,
    ];
}
