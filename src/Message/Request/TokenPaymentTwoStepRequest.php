<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Request;

/**
 * @method static TokenPaymentTwoStepRequest create()
 *
 * @see https://developers.cloudpayments.ru/#oplata-po-tokenu-rekarring
 */
class TokenPaymentTwoStepRequest extends TokenPaymentOneStepRequest
{
    /**
     * {@inheritDoc}
     */
    protected function getRelativeUrl(): string
    {
        return '/payments/tokens/auth';
    }
}
