<?php

namespace AvtoDev\CloudPayments\References;

/**
 * @see https://developers.cloudpayments.ru/#sozdanie-podpiski-na-rekurrentnye-platezhi
 */
interface Interval
{
    public const DAY   = 'Day';

    public const WEEK  = 'Week';

    public const MONTH = 'Month';
}
