<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Request\Model;

use AvtoDev\CloudPayments\Message\Traits\ModelField\AccountIdStringNull;
use AvtoDev\CloudPayments\Message\Traits\ModelField\AmountFloat;
use AvtoDev\CloudPayments\Message\Traits\ModelField\CardCryptogramPacketString;
use AvtoDev\CloudPayments\Message\Traits\ModelField\CurrencyString;
use AvtoDev\CloudPayments\Message\Traits\ModelField\DescriptionStringNull;
use AvtoDev\CloudPayments\Message\Traits\ModelField\EmailStringNull;
use AvtoDev\CloudPayments\Message\Traits\ModelField\InvoiceIdStringNull;
use AvtoDev\CloudPayments\Message\Traits\ModelField\IpAddressString;
use AvtoDev\CloudPayments\Message\Traits\ModelField\JsonDataStringNull;
use AvtoDev\CloudPayments\Message\Traits\ModelField\NameString;

/**
 * @see https://developers.cloudpayments.ru/#oplata-po-kriptogramme
 */
class CryptogramPaymentModel extends AbstractModel
{
    use AmountFloat,
        CurrencyString,
        IpAddressString,
        NameString,
        CardCryptogramPacketString,
        InvoiceIdStringNull,
        DescriptionStringNull,
        AccountIdStringNull,
        EmailStringNull,
        JsonDataStringNull;

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'Amount'               => $this->getAmount(),
            'Currency'             => $this->getCurrency(),
            'IpAddress'            => $this->getIpAddress(),
            'Name'                 => $this->getName(),
            'CardCryptogramPacket' => $this->getCardCryptogramPacket(),
            'InvoiceId'            => $this->getInvoiceId(),
            'Description'          => $this->getDescription(),
            'AccountId'            => $this->getAccountId(),
            'Email'                => $this->getEmail(),
            'JsonData'             => $this->getJsonData(),
        ];
    }
}
