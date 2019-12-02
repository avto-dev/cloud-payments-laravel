<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait AcsUrlString
{
    /** @var string */
    protected $acs_url;

    /**
     * @return string
     */
    public function getAcsUrl(): string
    {
        return $this->acs_url;
    }

    /**
     * @param string $acs_url
     *
     * @return $this
     */
    public function setAcsUrl(string $acs_url): self
    {
        $this->acs_url = $acs_url;

        return $this;
    }
}
