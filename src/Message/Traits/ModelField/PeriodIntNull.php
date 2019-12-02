<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait PeriodIntNull
{
    /** @var int|null */
    protected $period;

    /**
     * @return int|null
     */
    public function getPeriod(): ?int
    {
        return $this->period;
    }

    /**
     * @param int|null $period
     *
     * @return $this
     */
    public function setPeriod(?int $period): self
    {
        $this->period = $period;

        return $this;
    }
}
