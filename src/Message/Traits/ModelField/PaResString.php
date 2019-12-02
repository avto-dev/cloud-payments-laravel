<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait PaResString
{
    /** @var string */
    protected $pa_res;

    /**
     * @return string
     */
    public function getPaRes(): string
    {
        return $this->pa_res;
    }

    /**
     * @param string $pa_res
     *
     * @return $this
     */
    public function setPaRes(string $pa_res): self
    {
        $this->pa_res = $pa_res;

        return $this;
    }
}
