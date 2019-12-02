<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Response\Model;

use AvtoDev\CloudPayments\Message\Traits\ModelField\DisplayNameString;
use AvtoDev\CloudPayments\Message\Traits\ModelField\DomainNameString;
use AvtoDev\CloudPayments\Message\Traits\ModelField\EpochTimestampInt;
use AvtoDev\CloudPayments\Message\Traits\ModelField\ExpiresAtInt;
use AvtoDev\CloudPayments\Message\Traits\ModelField\MerchantIdentifierString;
use AvtoDev\CloudPayments\Message\Traits\ModelField\MerchantSessionIdentifierString;
use AvtoDev\CloudPayments\Message\Traits\ModelField\NonceString;
use AvtoDev\CloudPayments\Message\Traits\ModelField\SignatureString;

class ApplePayStartSessionModel extends AbstractModel
{
    use EpochTimestampInt,
        ExpiresAtInt,
        MerchantSessionIdentifierString,
        NonceString,
        MerchantIdentifierString,
        DomainNameString,
        DisplayNameString,
        SignatureString;

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'epochTimestamp'            => $this->getEpochTimestamp(),
            'expiresAt'                 => $this->getExpiresAt(),
            'merchantSessionIdentifier' => $this->getMerchantSessionIdentifier(),
            'nonce'                     => $this->getNonce(),
            'merchantIdentifier'        => $this->getMerchantIdentifier(),
            'domainName'                => $this->getDomainName(),
            'displayName'               => $this->getDisplayName(),
            'signature'                 => $this->getSignature(),
        ];
    }
}
