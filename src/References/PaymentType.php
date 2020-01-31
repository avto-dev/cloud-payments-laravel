<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\References;

/**
 * @see https://developers.cloudpayments.ru/#sposoby-rascheta
 */
class PaymentType
{
    public const UNKNOWN = 0;

    public const FULL_PREPAYMENT = 1;

    public const PARTIAL_PREPAYMENT = 2;

    public const ADVANCE_PAY = 3;

    public const FULL_PAY = 4;

    public const PARTIAL_PAY_AND_CREDIT = 5;

    public const CREDIT = 6;

    public const CREDIT_PAYMENT = 7;
}
