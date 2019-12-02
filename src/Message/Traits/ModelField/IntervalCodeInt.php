<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait IntervalCodeInt
{
    /** @var int */
    protected $interval_code;

    /**
     * @return int
     */
    public function getIntervalCode(): int
    {
        return $this->interval_code;
    }

    /**
     * @param int $interval_code
     *
     * @return $this
     */
    public function setIntervalCode(int $interval_code): self
    {
        $this->interval_code = $interval_code;

        return $this;
    }
}
