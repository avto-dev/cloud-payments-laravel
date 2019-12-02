<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Request;

use AvtoDev\CloudPayments\Message\Request\Model\ModelInterface;
use AvtoDev\CloudPayments\Message\Request\Model\TokenPaymentModel;
use AvtoDev\CloudPayments\Message\Response\CryptogramTransactionAcceptedResponse;
use AvtoDev\CloudPayments\Message\Response\CryptogramTransactionRejectedResponse;
use AvtoDev\CloudPayments\Message\Response\InvalidRequestResponse;
use AvtoDev\CloudPayments\Message\Strategy\StrategyInterface;
use AvtoDev\CloudPayments\Message\Strategy\TokenPaymentStrategy;

/**
 * @method TokenPaymentModel getModel()
 * @method InvalidRequestResponse|CryptogramTransactionRejectedResponse|CryptogramTransactionAcceptedResponse send()
 * @method static TokenPaymentOneStepRequest create()
 *
 * @see https://developers.cloudpayments.ru/#oplata-po-tokenu-rekarring
 */
class TokenPaymentOneStepRequest extends AbstractRequest
{
    /**
     * {@inheritdoc}
     */
    public function createModel(): ModelInterface
    {
        return new TokenPaymentModel;
    }

    /**
     * {@inheritdoc}
     */
    public function getStrategy(): StrategyInterface
    {
        return new TokenPaymentStrategy;
    }

    /**
     * {@inheritdoc}
     */
    protected function getRelativeUrl(): string
    {
        return '/payments/tokens/charge';
    }
}
