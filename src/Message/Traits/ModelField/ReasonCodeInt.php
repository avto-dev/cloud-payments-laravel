<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait ReasonCodeInt
{
    /** @var int */
    protected $reason_code;

    /**
     * @return int
     */
    public function getReasonCode(): int
    {
        return $this->reason_code;
    }

    /**
     * @param int $reason_code
     *
     * @return $this
     */
    public function setReasonCode(int $reason_code): self
    {
        $this->reason_code = $reason_code;

        return $this;
    }
}
