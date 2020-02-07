<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\References;

/**
 * @see https://developers.cloudpayments.ru/#sozdanie-podpiski-na-rekurrentnye-platezhi
 */
interface Interval
{
    /**
     * Supported intervals
     */
    public const
        DAY = 'Day',
        WEEK = 'Week',
        MONTH = 'Month';
}
