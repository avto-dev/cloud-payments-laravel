<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait StartDateIsoString
{
    /** @var string */
    protected $start_date_iso;

    /**
     * @return string
     */
    public function getStartDateIso(): string
    {
        return $this->start_date_iso;
    }

    /**
     * @param string $start_date_iso
     *
     * @return $this
     */
    public function setStartDateIso(string $start_date_iso): self
    {
        $this->start_date_iso = $start_date_iso;

        return $this;
    }
}
