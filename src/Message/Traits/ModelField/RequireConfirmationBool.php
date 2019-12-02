<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait RequireConfirmationBool
{
    /** @var bool */
    protected $require_confirmation;

    /**
     * @return bool
     */
    public function isRequireConfirmation(): bool
    {
        return $this->require_confirmation;
    }

    /**
     * @param bool $require_confirmation
     *
     * @return $this
     */
    public function setRequireConfirmation(bool $require_confirmation): self
    {
        $this->require_confirmation = $require_confirmation;

        return $this;
    }
}
