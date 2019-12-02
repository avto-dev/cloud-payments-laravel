<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait RequireConfirmationBoolNull
{
    /** @var bool|null */
    protected $require_confirmation;

    /**
     * @return bool|null
     */
    public function isRequireConfirmation(): ?bool
    {
        return $this->require_confirmation;
    }

    /**
     * @param bool|null $require_confirmation
     *
     * @return $this
     */
    public function setRequireConfirmation(?bool $require_confirmation): self
    {
        $this->require_confirmation = $require_confirmation;

        return $this;
    }
}
