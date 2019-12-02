<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait StartDateString
{
    /** @var string */
    protected $start_date;

    /**
     * @return string
     */
    public function getStartDate(): string
    {
        return $this->start_date;
    }

    /**
     * @param string $start_date
     *
     * @return $this
     */
    public function setStartDate(string $start_date): self
    {
        $this->start_date = $start_date;

        return $this;
    }
}
