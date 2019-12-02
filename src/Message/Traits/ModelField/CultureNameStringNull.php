<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait CultureNameStringNull
{
    /** @var string|null */
    protected $culture_name;

    /**
     * @return string|null
     */
    public function getCultureName(): ?string
    {
        return $this->culture_name;
    }

    /**
     * @param string|null $culture_name
     *
     * @return $this
     */
    public function setCultureName(?string $culture_name): self
    {
        $this->culture_name = $culture_name;

        return $this;
    }
}
