<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\References;

/**
 * @see https://developers.cloudpayments.ru/#predmety-rascheta
 */
class PaymentObject
{
    public const UNKNOWN           = 0;

    public const COMMODITY         = 1;

    public const EXCISED_COMMODITY = 2;

    public const JOB               = 3;

    public const SERVICE           = 4;

    public const GAMBLING_BET      = 5;

    public const GAMBLING_WIN      = 6;

    public const LOTTERY_TICKET    = 7;

    public const LOTTERY_WIN       = 8;

    /**
     * Research and technological development.
     */
    public const RTD_ACCESS   = 9;

    public const PAYMENT      = 10;

    public const AGENT_REWARD = 11;

    public const COMPOSITE    = 12;

    /**
     * All other type.
     */
    public const ANOTHER = 13;
}
