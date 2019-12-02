<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait ReasonString
{
    /** @var string */
    protected $reason;

    /**
     * @return string
     */
    public function getReason(): string
    {
        return $this->reason;
    }

    /**
     * @param string $reason
     *
     * @return $this
     */
    public function setReason(string $reason): self
    {
        $this->reason = $reason;

        return $this;
    }
}
