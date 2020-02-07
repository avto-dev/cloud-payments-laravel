<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\References;

/**
 * @see https://developers.cloudpayments.ru/#znacheniya-stavki-VAT
 */
interface Vat
{
    public const NO_VAT = null,
        VAT_0 = 0, // VAT 0%.
        VAT_10 = 10, // VAT 10%.
        VAT_20 = 20, // VAT 20%.
        VAT_10_110 = 110, // Estimated VAT 10/110.
        VAT_20_120 = 120; // Estimated VAT 20/120.
}
