<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait ConfirmDateStringNull
{
    /** @var string|null */
    protected $confirm_date;

    /**
     * @return string|null
     */
    public function getConfirmDate(): ?string
    {
        return $this->confirm_date;
    }

    /**
     * @param string|null $confirm_date
     *
     * @return $this
     */
    public function setConfirmDate(?string $confirm_date): self
    {
        $this->confirm_date = $confirm_date;

        return $this;
    }
}
