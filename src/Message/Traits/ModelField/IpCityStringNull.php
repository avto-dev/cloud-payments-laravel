<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait IpCityStringNull
{
    /** @var string|null */
    protected $ip_city;

    /**
     * @return string|null
     */
    public function getIpCity(): ?string
    {
        return $this->ip_city;
    }

    /**
     * @param string|null $ip_city
     *
     * @return $this
     */
    public function setIpCity(?string $ip_city): self
    {
        $this->ip_city = $ip_city;

        return $this;
    }
}
