<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait IpAddressString
{
    /** @var string */
    protected $ip_address;

    /**
     * @return string
     */
    public function getIpAddress(): string
    {
        return $this->ip_address;
    }

    /**
     * @param string $ip_address
     *
     * @return $this
     */
    public function setIpAddress(string $ip_address): self
    {
        $this->ip_address = $ip_address;

        return $this;
    }
}
