<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Request\Model;

use AvtoDev\CloudPayments\Message\Traits\ModelField\AccountIdString;
use AvtoDev\CloudPayments\Message\Traits\ModelField\AmountFloat;
use AvtoDev\CloudPayments\Message\Traits\ModelField\CurrencyString;
use AvtoDev\CloudPayments\Message\Traits\ModelField\DescriptionStringNull;
use AvtoDev\CloudPayments\Message\Traits\ModelField\EmailStringNull;
use AvtoDev\CloudPayments\Message\Traits\ModelField\InvoiceIdStringNull;
use AvtoDev\CloudPayments\Message\Traits\ModelField\IpAddressStringNull;
use AvtoDev\CloudPayments\Message\Traits\ModelField\JsonDataStringNull;
use AvtoDev\CloudPayments\Message\Traits\ModelField\TokenString;

/**
 * @see https://developers.cloudpayments.ru/#obrabotka-3-d-secure
 */
class TokenPaymentModel extends AbstractModel
{
    use AmountFloat,
        CurrencyString,
        AccountIdString,
        TokenString,
        InvoiceIdStringNull,
        DescriptionStringNull,
        IpAddressStringNull,
        EmailStringNull,
        JsonDataStringNull;

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'Amount'      => $this->getAmount(),
            'Currency'    => $this->getCurrency(),
            'AccountId'   => $this->getAccountId(),
            'Token'       => $this->getToken(),
            'InvoiceId'   => $this->getInvoiceId(),
            'Description' => $this->getDescription(),
            'IpAddress'   => $this->getIpAddress(),
            'Email'       => $this->getEmail(),
            'JsonData'    => $this->getJsonData(),
        ];
    }
}
