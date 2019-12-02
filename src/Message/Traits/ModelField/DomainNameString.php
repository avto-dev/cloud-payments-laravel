<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait DomainNameString
{
    /** @var string */
    protected $domain_name;

    /**
     * @return string
     */
    public function getDomainName(): string
    {
        return $this->domain_name;
    }

    /**
     * @param string $domain_name
     *
     * @return $this
     */
    public function setDomainName(string $domain_name): self
    {
        $this->domain_name = $domain_name;

        return $this;
    }
}
