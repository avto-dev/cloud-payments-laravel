<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\References;

/**
 * @see https://developers.cloudpayments.ru/#sistemy-nalogooblozheniya
 */
class TaxationSystem
{
    /**
     * General taxation system.
     */
    public const OSN = 0;

    /**
     * Simplified tax system (Income).
     */
    public const USN_INCOME = 1;

    /**
     * Simplified tax system (Income - Outcome).
     */
    public const USN_INCOME_OUTCOME = 2;

    /**
     * A single tax on imputed income.
     */
    public const ENVD = 3;

    /**
     * Single agricultural tax.
     */
    public const ESHN = 4;

    /**
     * Patent Tax System.
     */
    public const PATENT = 5;
}
