<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait MerchantSessionIdentifierString
{
    /** @var string */
    protected $merchant_session_identifier;

    /**
     * @return string
     */
    public function getMerchantSessionIdentifier(): string
    {
        return $this->merchant_session_identifier;
    }

    /**
     * @param string $merchant_session_identifier
     *
     * @return $this
     */
    public function setMerchantSessionIdentifier(string $merchant_session_identifier): self
    {
        $this->merchant_session_identifier = $merchant_session_identifier;

        return $this;
    }
}
