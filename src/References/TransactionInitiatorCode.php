<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\References;

/**
 * Flag of the initiator of the transaction.
 */
interface TransactionInitiatorCode
{
    /**
     * Transaction initiated by the merchant based on previously saved credentials;
     */
    public const MERCHANT = 0;

    /**
     * Transaction initiated by the cardholder (customer) based on previously saved credentials.
     */
    public const CLIENT = 1;
}
