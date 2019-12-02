<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait TestModeBool
{
    /** @var bool */
    protected $test_mode;

    /**
     * @return bool
     */
    public function isTestMode(): bool
    {
        return $this->test_mode;
    }

    /**
     * @param bool $test_mode
     *
     * @return $this
     */
    public function setTestMode(bool $test_mode): self
    {
        $this->test_mode = $test_mode;

        return $this;
    }
}
