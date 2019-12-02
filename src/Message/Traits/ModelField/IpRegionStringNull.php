<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait IpRegionStringNull
{
    /** @var string|null */
    protected $ip_region;

    /**
     * @return string|null
     */
    public function getIpRegion(): ?string
    {
        return $this->ip_region;
    }

    /**
     * @param string|null $ip_region
     *
     * @return $this
     */
    public function setIpRegion(?string $ip_region): self
    {
        $this->ip_region = $ip_region;

        return $this;
    }
}
