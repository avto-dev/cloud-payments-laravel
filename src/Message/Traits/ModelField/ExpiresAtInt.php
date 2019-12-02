<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait ExpiresAtInt
{
    /** @var int */
    protected $expires_at;

    /**
     * @return int
     */
    public function getExpiresAt(): int
    {
        return $this->expires_at;
    }

    /**
     * @param int $expires_at
     *
     * @return $this
     */
    public function setExpiresAt(int $expires_at): self
    {
        $this->expires_at = $expires_at;

        return $this;
    }
}
