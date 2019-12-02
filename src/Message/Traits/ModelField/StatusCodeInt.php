<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait StatusCodeInt
{
    /** @var int */
    protected $status_code;

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->status_code;
    }

    /**
     * @param int $status_code
     *
     * @return $this
     */
    public function setStatusCode(int $status_code): self
    {
        $this->status_code = $status_code;

        return $this;
    }
}
