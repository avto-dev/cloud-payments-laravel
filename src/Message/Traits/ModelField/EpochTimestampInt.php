<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait EpochTimestampInt
{
    /** @var int */
    protected $epoch_timestamp;

    /**
     * @return int
     */
    public function getEpochTimestamp(): int
    {
        return $this->epoch_timestamp;
    }

    /**
     * @param int $epoch_timestamp
     *
     * @return $this
     */
    public function setEpochTimestamp(int $epoch_timestamp): self
    {
        $this->epoch_timestamp = $epoch_timestamp;

        return $this;
    }
}
