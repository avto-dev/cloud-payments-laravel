<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\References;

/**
 * @see https://developers.cloudpayments.ru/#predmety-rascheta
 */
interface PaymentObject
{
    public const
        UNKNOWN = 0,
        COMMODITY = 1,
        EXCISED_COMMODITY = 2,
        JOB = 3,
        SERVICE = 4,
        GAMBLING_BET = 5,
        GAMBLING_WIN = 6,
        LOTTERY_TICKET = 7,
        LOTTERY_WIN = 8,
        RTD_ACCESS = 9, // Research and technological development.
        PAYMENT = 10,
        AGENT_REWARD = 11,
        COMPOSITE = 12,
        ANOTHER = 13; // All other types.
}
