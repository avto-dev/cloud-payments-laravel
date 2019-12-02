<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait CreatedDateIsoString
{
    /** @var string */
    protected $created_date_iso;

    /**
     * @return string
     */
    public function getCreatedDateIso(): string
    {
        return $this->created_date_iso;
    }

    /**
     * @param string $created_date_iso
     *
     * @return $this
     */
    public function setCreatedDateIso(string $created_date_iso): self
    {
        $this->created_date_iso = $created_date_iso;

        return $this;
    }
}
