<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Request\Model;

use AvtoDev\CloudPayments\Message\Traits\ModelField\IdString;

/**
 * @see https://developers.cloudpayments.ru/#otmena-podpiski-na-rekurrentnye-platezhi
 */
class CancelSubscriptionModel extends AbstractModel
{
    use IdString;

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'Id' => $this->getId(),
        ];
    }
}
