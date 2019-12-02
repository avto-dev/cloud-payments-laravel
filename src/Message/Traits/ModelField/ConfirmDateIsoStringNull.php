<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait ConfirmDateIsoStringNull
{
    /** @var string|null */
    protected $confirm_date_iso;

    /**
     * @return string|null
     */
    public function getConfirmDateIso(): ?string
    {
        return $this->confirm_date_iso;
    }

    /**
     * @param string|null $confirm_date_iso
     *
     * @return $this
     */
    public function setConfirmDateIso(?string $confirm_date_iso): self
    {
        $this->confirm_date_iso = $confirm_date_iso;

        return $this;
    }
}
