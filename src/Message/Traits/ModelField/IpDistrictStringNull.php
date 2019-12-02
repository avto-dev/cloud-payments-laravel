<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait IpDistrictStringNull
{
    /** @var string|null */
    protected $ip_district;

    /**
     * @return string|null
     */
    public function getIpDistrict(): ?string
    {
        return $this->ip_district;
    }

    /**
     * @param string|null $ip_district
     *
     * @return $this
     */
    public function setIpDistrict(?string $ip_district): self
    {
        $this->ip_district = $ip_district;

        return $this;
    }
}
