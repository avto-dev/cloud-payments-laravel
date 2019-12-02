<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Request;

/**
 * @see https://developers.cloudpayments.ru/#oplata-po-kriptogramme
 *
 * @method static CryptogramPaymentTwoStepRequest create()
 */
class CryptogramPaymentTwoStepRequest extends CryptogramPaymentOneStepRequest
{
    /**
     * {@inheritdoc}
     */
    protected function getRelativeUrl(): string
    {
        return '/payments/cards/auth';
    }
}
