<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Reference;

/**
 * @see https://developers.cloudpayments.ru/#predmety-rascheta
 */
class PaymentObject
{
    /**
     * Unknown item of payment.
     */
    public const UNKNOWN = 0;

    /**
     * Product.
     */
    public const COMMODITY = 1;

    /**
     * Excisable goods.
     */
    public const EXCISED_COMMODITY = 2;

    /**
     * Job.
     */
    public const JOB = 3;

    /**
     * Service.
     */
    public const SERVICE = 4;

    /**
     * Gambling bet.
     */
    public const GAMBLING_BET = 5;

    /**
     * Gambling win.
     */
    public const GAMBLING_WIN = 6;

    /**
     * Lottery ticket.
     */
    public const LOTTERY_TICKET = 7;

    /**
     * Lottery win.
     */
    public const LOTTERY_WIN = 8;

    /**
     * Providing Reed.
     */
    public const RID_ACCESS = 9;

    /**
     * Payment.
     */
    public const PAYMENT = 10;

    /**
     * Agent's commission.
     */
    public const AGENT_REWARD = 11;

    /**
     * Compound subject of calculation.
     */
    public const COMPOSITE = 12;

    /**
     * Another subject of calculation.
     */
    public const ANOTHER = 13;
}
