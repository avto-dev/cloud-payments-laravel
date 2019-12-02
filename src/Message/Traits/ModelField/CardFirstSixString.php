<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait CardFirstSixString
{
    /** @var string */
    protected $card_first_six;

    /**
     * @return string
     */
    public function getCardFirstSix(): string
    {
        return $this->card_first_six;
    }

    /**
     * @param string $card_first_six
     *
     * @return $this
     */
    public function setCardFirstSix(string $card_first_six): self
    {
        $this->card_first_six = $card_first_six;

        return $this;
    }
}
