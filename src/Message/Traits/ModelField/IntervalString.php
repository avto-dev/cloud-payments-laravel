<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait IntervalString
{
    /** @var string */
    protected $interval;

    /**
     * @return string
     */
    public function getInterval(): string
    {
        return $this->interval;
    }

    /**
     * @param string $interval
     *
     * @return $this
     */
    public function setInterval(string $interval): self
    {
        $this->interval = $interval;

        return $this;
    }
}
