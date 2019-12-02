<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait SignatureString
{
    /** @var string */
    protected $signature;

    /**
     * @return string
     */
    public function getSignature(): string
    {
        return $this->signature;
    }

    /**
     * @param string $signature
     *
     * @return $this
     */
    public function setSignature(string $signature): self
    {
        $this->signature = $signature;

        return $this;
    }
}
