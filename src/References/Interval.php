<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\References;

/**
 * @see https://developers.cloudpayments.ru/#sozdanie-podpiski-na-rekurrentnye-platezhi
 */
interface Interval
{
    /**
     * Supported intervals.
     */
    public const DAY = 'Day';
    public const WEEK = 'Week';
    public const MONTH = 'Month';

    public const INTERVALS_LIST = [
        self::DAY,
        self::WEEK,
        self::MONTH,
    ];
}
