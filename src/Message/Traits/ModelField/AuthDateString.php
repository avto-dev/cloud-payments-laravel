<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait AuthDateString
{
    /** @var string */
    protected $auth_date;

    /**
     * @return string
     */
    public function getAuthDate(): string
    {
        return $this->auth_date;
    }

    /**
     * @param string $auth_date
     *
     * @return $this
     */
    public function setAuthDate(string $auth_date): self
    {
        $this->auth_date = $auth_date;

        return $this;
    }
}
