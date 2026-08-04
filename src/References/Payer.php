<?php

declare(strict_types=1);

namespace AvtoDev\CloudPayments\References;

/**
 * @see https://developers.cloudpayments.ru/#oplata-po-kriptogramme
 */
interface Payer
{
    /**
     * Supported Payer fields and their descriptions.
     */
    public const
        FIRST_NAME  = 'FirstName',  // First name of the payer.
        LAST_NAME   = 'LastName',   // Last name of the payer.
        MIDDLE_NAME = 'MiddleName', // Middle name of the payer.
        BIRTH       = 'Birth',      // Date of birth of the payer.
        STREET      = 'Street',     // Street address of the payer.
        ADDRESS     = 'Address',    // Full address of the payer.
        CITY        = 'City',       // City of the payer.
        COUNTRY     = 'Country',    // Country of the payer.
        PHONE       = 'Phone',      // Phone number of the payer.
        POSTCODE    = 'Postcode';   // Postal code of the payer.
}
