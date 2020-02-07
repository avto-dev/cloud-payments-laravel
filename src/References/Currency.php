<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\References;

/**
 * @see https://developers.cloudpayments.ru/#spisok-valyut
 */
interface Currency
{
    /**
     * Supported currencies.
     */
    public const
        RUB = 'RUB', // Russian Rouble.
        EUR = 'EUR', // Euro.
        USD = 'USD', // USA Dollar.
        GBP = 'GBP', // British pound.
        UAH = 'UAH', // Ukraine Hryvnia.
        BYN = 'BYN', // Belarusian Ruble.
        KZT = 'KZT', // Kazakhstan Tenge.
        AZN = 'AZN', // Azerbaijan Manat.
        CHF = 'CHF', // Swiss Franc.
        CZK = 'CZK', // Czech Koruna.
        CAD = 'CAD', // Canadian Dollar.
        PLN = 'PLN', // Zloty.
        SEK = 'SEK', // Swedish Krona.
        TRY = 'TRY', // Turkish Lira.
        CNY = 'CNY', // Yuan Renminbi.
        INR = 'INR', // Indian Rupee.
        BRL = 'BRL', // Brazilian Real.
        ZAR = 'ZAR', // Rand.
        UZS = 'UZS', // Uzbekistan Sum.
        BGL = 'BGL'; // Bulgarian Lev.
}
