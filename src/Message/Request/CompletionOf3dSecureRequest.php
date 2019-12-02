<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Request;

use AvtoDev\CloudPayments\Message\Request\Model\ModelInterface;
use AvtoDev\CloudPayments\Message\Response\Cryptogram3dSecureAuthRequiredResponse;
use AvtoDev\CloudPayments\Message\Response\CryptogramTransactionAcceptedResponse;
use AvtoDev\CloudPayments\Message\Response\CryptogramTransactionRejectedResponse;
use AvtoDev\CloudPayments\Message\Response\InvalidRequestResponse;
use AvtoDev\CloudPayments\Message\Strategy\CryptogramPaymentStrategy;
use AvtoDev\CloudPayments\Message\Request\Model\CompletionOf3dSecureModel;
use AvtoDev\CloudPayments\Message\Strategy\StrategyInterface;

/**
 * @method CompletionOf3dSecureModel getModel()
 * @method InvalidRequestResponse|Cryptogram3dSecureAuthRequiredResponse|CryptogramTransactionRejectedResponse|CryptogramTransactionAcceptedResponse send()
 * @method static CompletionOf3dSecureRequest create()
 *
 * @see https://developers.cloudpayments.ru/#obrabotka-3-d-secure
 */
class CompletionOf3dSecureRequest extends AbstractRequest
{
    /**
     * {@inheritDoc}
     */
    protected function getRelativeUrl(): string
    {
        return '/payments/cards/post3ds';
    }

    /**
     * {@inheritDoc}
     */
    public function createModel(): ModelInterface
    {
        return new CompletionOf3dSecureModel;
    }

    /**
     * {@inheritDoc}
     */
    public function getStrategy(): StrategyInterface
    {
        return new CryptogramPaymentStrategy;
    }
}
