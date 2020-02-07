<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\References;

/**
 * @see https://developers.cloudpayments.ru/#sistemy-nalogooblozheniya
 */
interface TaxationSystem
{
    /**
     * Taxation systems.
     */
    public const
        OSN = 0, // General taxation system.
        USN_INCOME = 1, // Simplified tax system (Income).
        USN_INCOME_OUTCOME = 2, // Simplified tax system (Income - Outcome).
        ENVD = 3, // A single tax on imputed income.
        ESHN = 4, // Single agricultural tax.
        PATENT = 5; // Patent Tax System.
}
