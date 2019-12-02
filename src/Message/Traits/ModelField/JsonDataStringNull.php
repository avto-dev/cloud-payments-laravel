<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait JsonDataStringNull
{
    /** @var string|null */
    protected $json_data;

    /**
     * @return string|null
     */
    public function getJsonData(): ?string
    {
        return $this->json_data;
    }

    /**
     * @param string|null $json_data
     *
     * @return $this
     */
    public function setJsonData(?string $json_data): self
    {
        $this->json_data = $json_data;

        return $this;
    }
}
