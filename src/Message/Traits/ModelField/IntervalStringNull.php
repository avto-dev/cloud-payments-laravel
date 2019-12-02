<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait IntervalStringNull
{
    /** @var string|null */
    protected $interval;

    /**
     * @return string|null
     */
    public function getInterval(): ?string
    {
        return $this->interval;
    }

    /**
     * @param string|null $interval
     *
     * @return $this
     */
    public function setInterval(?string $interval): self
    {
        $this->interval = $interval;

        return $this;
    }
}
