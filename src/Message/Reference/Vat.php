<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Reference;

/**
 * @see https://developers.cloudpayments.ru/#znacheniya-stavki-nds
 */
class Vat
{
    /**
     * NDS is not appearing.
     */
    public const NO_NDS = null;

    /**
     * NDS 0%.
     */
    public const NDS_0 = 0;

    /**
     * NDS 10%.
     */
    public const NDS_10 = 10;

    /**
     * NDS 20%.
     */
    public const NDS_20 = 20;

    /**
     * Estimated NDS 10/110.
     */
    public const NDS_10_110 = 110;

    /**
     * Estimated NDS 20/120.
     */
    public const NDS_20_120 = 120;
}
