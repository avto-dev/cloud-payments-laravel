<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\References;

/**
 * @see https://developers.cloudpayments.ru/#lokalizatsiya
 */
interface CultureName
{
    /**
     * Supported culture names and their respective time zones.
     */
    public const
        RU_RU = 'ru-RU', // Russian, MSK.
        EN_US = 'en-US', // English, CET.
        LV = 'lv',       // Latvian, CET.
        AZ = 'az',       // Azerbaijani, AZT.
        KK = 'kk',       // Russian, ALMT.
        UK = 'uk',       // Ukrainian, EET.
        PL = 'pl',       // Polish, CET.
        VI = 'vi',       // Vietnamese, ICT.
        TR = 'tr';       // Turkish, TRT.
}
