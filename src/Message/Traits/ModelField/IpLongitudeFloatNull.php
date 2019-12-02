<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait IpLongitudeFloatNull
{
    /** @var float|null */
    protected $ip_longitude;

    /**
     * @return float|null
     */
    public function getIpLongitude(): ?float
    {
        return $this->ip_longitude;
    }

    /**
     * @param float|null $ip_longitude
     *
     * @return $this
     */
    public function setIpLongitude(?float $ip_longitude): self
    {
        $this->ip_longitude = $ip_longitude;

        return $this;
    }
}
