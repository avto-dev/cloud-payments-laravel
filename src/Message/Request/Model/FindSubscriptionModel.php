<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Request\Model;

use AvtoDev\CloudPayments\Message\Traits\ModelField\AccountIdString;

/**
 * @see https://developers.cloudpayments.ru/#poisk-podpisok
 */
class FindSubscriptionModel extends AbstractModel
{
    use AccountIdString;

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'AccountId' => $this->getAccountId(),
        ];
    }
}
