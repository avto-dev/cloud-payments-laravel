<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Request\Model;

use AvtoDev\CloudPayments\Message\Traits\ModelField\IdString;

/**
 * @see https://developers.cloudpayments.ru/#zapros-informatsii-o-podpiske
 */
class GetSubscriptionModel extends AbstractModel
{
    use IdString;

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return [
            'Id' => $this->getId(),
        ];
    }
}
