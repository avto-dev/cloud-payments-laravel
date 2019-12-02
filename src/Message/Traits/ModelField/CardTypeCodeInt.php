<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelField;

trait CardTypeCodeInt
{
    /** @var int */
    protected $card_type_code;

    /**
     * @return int
     */
    public function getCardTypeCode(): int
    {
        return $this->card_type_code;
    }

    /**
     * @param int $card_type_code
     *
     * @return $this
     */
    public function setCardTypeCode(int $card_type_code): self
    {
        $this->card_type_code = $card_type_code;

        return $this;
    }
}
