<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\References;

/**
 * @see https://developers.cloudpayments.ru/#znacheniya-stavki-VAT
 */
class Vat
{
    public const NO_VAT = null;

    /**
     * VAT 0%.
     */
    public const VAT_0 = 0;

    /**
     * VAT 10%.
     */
    public const VAT_10 = 10;

    /**
     * VAT 20%.
     */
    public const VAT_20 = 20;

    /**
     * Расчетный VAT 10/110.
     */
    public const VAT_10_110 = 110;

    /**
     * Расчетный VAT 20/120.
     */
    public const VAT_20_120 = 120;
}
