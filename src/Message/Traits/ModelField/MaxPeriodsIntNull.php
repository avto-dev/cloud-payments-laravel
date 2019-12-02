<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait MaxPeriodsIntNull
{
    /** @var int|null */
    protected $max_periods;

    /**
     * @return int|null
     */
    public function getMaxPeriods(): ?int
    {
        return $this->max_periods;
    }

    /**
     * @param int|null $max_periods
     *
     * @return $this
     */
    public function setMaxPeriods(?int $max_periods): self
    {
        $this->max_periods = $max_periods;

        return $this;
    }
}
