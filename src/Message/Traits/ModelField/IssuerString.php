<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait IssuerString
{
    /** @var string */
    protected $issuer;

    /**
     * @return string
     */
    public function getIssuer(): string
    {
        return $this->issuer;
    }

    /**
     * @param string $issuer
     *
     * @return $this
     */
    public function setIssuer(string $issuer): self
    {
        $this->issuer = $issuer;

        return $this;
    }
}
