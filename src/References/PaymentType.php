<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\References;

/**
 * @see https://developers.cloudpayments.ru/#sposoby-rascheta
 */
interface PaymentType
{
    public const
        UNKNOWN = 0,
        FULL_PREPAYMENT = 1,
        PARTIAL_PREPAYMENT = 2,
        ADVANCE_PAY = 3,
        FULL_PAY = 4,
        PARTIAL_PAY_AND_CREDIT = 5,
        CREDIT = 6,
        CREDIT_PAYMENT = 7;
}
