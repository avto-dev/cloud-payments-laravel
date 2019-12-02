<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Request;

use AvtoDev\CloudPayments\Message\Request\Model\ModelInterface;
use AvtoDev\CloudPayments\Message\Strategy\ApplePayStartSessionStrategy;
use AvtoDev\CloudPayments\Message\Request\Model\ApplePayStartSessionModel;
use AvtoDev\CloudPayments\Message\Strategy\StrategyInterface;

/**
 * @method ApplePayStartSessionModel getModel()
 * @method static ApplePayStartSessionRequest create()
 *
 * @see https://developers.cloudpayments.ru/#zapusk-sessii-dlya-oplaty-cherez-apple-pay
 */
class ApplePayStartSessionRequest extends AbstractRequest
{
    /**
     * {@inheritDoc}
     */
    protected function getRelativeUrl(): string
    {
        return '/applepay/startsession';
    }

    /**
     * {@inheritDoc}
     */
    public function createModel(): ModelInterface
    {
        return new ApplePayStartSessionModel;
    }

    /**
     * {@inheritDoc}
     */
    public function getStrategy(): StrategyInterface
    {
        return new ApplePayStartSessionStrategy;
    }
}
