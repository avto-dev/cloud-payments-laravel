<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait PeriodInt
{
    /** @var int */
    protected $period;

    /**
     * @return int
     */
    public function getPeriod(): int
    {
        return $this->period;
    }

    /**
     * @param int $period
     *
     * @return $this
     */
    public function setPeriod(int $period): self
    {
        $this->period = $period;

        return $this;
    }
}
