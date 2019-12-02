<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Reference;

/**
 * @see https://developers.cloudpayments.ru/#sposoby-rascheta
 */
class PaymentType
{
    /**
     * Unknown calculation method.
     */
    public const UNKNOWN = 0;

    /**
     * 100% prepayment.
     */
    public const FULL_PREPAYMENT = 1;

    /**
     * Prepayment.
     */
    public const PARTIAL_PREPAYMENT = 2;

    /**
     * Prepaid expense
     */
    public const ADVANCE_PAY = 3;

    /**
     * Full settlement
     */
    public const FULL_PAY = 4;

    /**
     * Partial settlement and credit
     */
    public const PARTIAL_PAY_AND_CREDIT = 5;

    /**
     * Credit Transfer
     */
    public const CREDIT = 6;

    /**
     * Credit payment.
     */
    public const CREDIT_PAYMENT = 7;
}
