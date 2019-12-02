<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait StartDateStringNull
{
    /** @var string|null */
    protected $start_date;

    /**
     * @return string|null
     */
    public function getStartDate(): ?string
    {
        return $this->start_date;
    }

    /**
     * @param string|null $start_date
     *
     * @return $this
     */
    public function setStartDate(?string $start_date): self
    {
        $this->start_date = $start_date;

        return $this;
    }
}
