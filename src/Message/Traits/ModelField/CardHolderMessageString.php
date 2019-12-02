<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait CardHolderMessageString
{
    /** @var string */
    protected $card_holder_message;

    /**
     * @return string
     */
    public function getCardHolderMessage(): string
    {
        return $this->card_holder_message;
    }

    /**
     * @param string $card_holder_message
     *
     * @return $this
     */
    public function setCardHolderMessage(string $card_holder_message): self
    {
        $this->card_holder_message = $card_holder_message;

        return $this;
    }
}
