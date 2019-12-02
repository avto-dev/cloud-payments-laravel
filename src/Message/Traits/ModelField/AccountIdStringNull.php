<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait AccountIdStringNull
{
    /** @var string|null */
    protected $account_id;

    /**
     * @return string|null
     */
    public function getAccountId(): ?string
    {
        return $this->account_id;
    }

    /**
     * @param string|null $account_id
     *
     * @return $this
     */
    public function setAccountId(?string $account_id): self
    {
        $this->account_id = $account_id;

        return $this;
    }
}
