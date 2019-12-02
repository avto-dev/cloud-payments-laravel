<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Request\Model;

use AvtoDev\CloudPayments\Message\Traits\ModelField\ValidationUrlString;

/**
 * @see https://developers.cloudpayments.ru/#zapusk-sessii-dlya-oplaty-cherez-apple-pay
 */
class ApplePayStartSessionModel extends AbstractModel
{
    use ValidationUrlString;

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'ValidationUrl' => $this->getValidationUrl(),
        ];
    }
}
