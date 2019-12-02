<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait DescriptionString
{
    /** @var string */
    protected $description;

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return $this
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
