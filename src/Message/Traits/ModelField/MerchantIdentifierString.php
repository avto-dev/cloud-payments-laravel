<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait MerchantIdentifierString
{
    /** @var string */
    protected $merchant_identifier;

    /**
     * @return string
     */
    public function getMerchantIdentifier(): string
    {
        return $this->merchant_identifier;
    }

    /**
     * @param string $merchant_identifier
     *
     * @return $this
     */
    public function setMerchantIdentifier(string $merchant_identifier): self
    {
        $this->merchant_identifier = $merchant_identifier;

        return $this;
    }
}
