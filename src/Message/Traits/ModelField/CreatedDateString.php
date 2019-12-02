<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait CreatedDateString
{
    /** @var string */
    protected $created_date;

    /**
     * @return string
     */
    public function getCreatedDate(): string
    {
        return $this->created_date;
    }

    /**
     * @param string $created_date
     *
     * @return $this
     */
    public function setCreatedDate(string $created_date): self
    {
        $this->created_date = $created_date;

        return $this;
    }
}
