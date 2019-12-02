<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait IpCountryString
{
    /** @var string */
    protected $ip_country;

    /**
     * @return string
     */
    public function getIpCountry(): string
    {
        return $this->ip_country;
    }

    /**
     * @param string $ip_country
     *
     * @return $this
     */
    public function setIpCountry(string $ip_country): self
    {
        $this->ip_country = $ip_country;

        return $this;
    }
}
