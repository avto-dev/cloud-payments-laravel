<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait DisplayNameString
{
    /** @var string */
    protected $display_name;

    /**
     * @return string
     */
    public function getDisplayName(): string
    {
        return $this->display_name;
    }

    /**
     * @param string $display_name
     *
     * @return $this
     */
    public function setDisplayName(string $display_name): self
    {
        $this->display_name = $display_name;

        return $this;
    }
}
