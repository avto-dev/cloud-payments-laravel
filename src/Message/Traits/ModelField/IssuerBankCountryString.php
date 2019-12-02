<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait IssuerBankCountryString
{
    /** @var string */
    protected $issuer_bank_country;

    /**
     * @return string
     */
    public function getIssuerBankCountry(): string
    {
        return $this->issuer_bank_country;
    }

    /**
     * @param string $issuer_bank_country
     *
     * @return $this
     */
    public function setIssuerBankCountry(string $issuer_bank_country): self
    {
        $this->issuer_bank_country = $issuer_bank_country;

        return $this;
    }
}
