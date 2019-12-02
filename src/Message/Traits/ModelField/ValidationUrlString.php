<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait ValidationUrlString
{
    /** @var string */
    protected $validation_url;

    /**
     * @return string
     */
    public function getValidationUrl(): string
    {
        return $this->validation_url;
    }

    /**
     * @param string $validation_url
     *
     * @return $this
     */
    public function setValidationUrl(string $validation_url): self
    {
        $this->validation_url = $validation_url;

        return $this;
    }
}
