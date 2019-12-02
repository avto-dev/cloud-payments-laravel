<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Request;

use AvtoDev\CloudPayments\Message\Request\Model\ModelInterface;
use AvtoDev\CloudPayments\Message\Response\Cryptogram3dSecureAuthRequiredResponse;
use AvtoDev\CloudPayments\Message\Response\CryptogramTransactionAcceptedResponse;
use AvtoDev\CloudPayments\Message\Response\CryptogramTransactionRejectedResponse;
use AvtoDev\CloudPayments\Message\Response\InvalidRequestResponse;
use AvtoDev\CloudPayments\Message\Strategy\CryptogramPaymentStrategy;
use AvtoDev\CloudPayments\Message\Request\Model\CryptogramPaymentModel;
use AvtoDev\CloudPayments\Message\Strategy\StrategyInterface;

/**
 * @method CryptogramPaymentModel getModel()
 * @method InvalidRequestResponse|Cryptogram3dSecureAuthRequiredResponse|CryptogramTransactionRejectedResponse|CryptogramTransactionAcceptedResponse send()
 * @method static CryptogramPaymentOneStepRequest create()
 *
 * @see https://developers.cloudpayments.ru/#oplata-po-kriptogramme
 */
class CryptogramPaymentOneStepRequest extends AbstractRequest
{
    /**
     * {@inheritDoc}
     */
    protected function getRelativeUrl(): string
    {
        return '/payments/cards/charge';
    }

    /**
     * {@inheritDoc}
     */
    public function createModel(): ModelInterface
    {
        return new CryptogramPaymentModel;
    }

    /**
     * {@inheritDoc}
     */
    public function getStrategy(): StrategyInterface
    {
        return new CryptogramPaymentStrategy;
    }
}
