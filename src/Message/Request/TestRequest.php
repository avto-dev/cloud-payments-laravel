<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Request;

use AvtoDev\CloudPayments\Message\Request\Model\ModelInterface;
use AvtoDev\CloudPayments\Message\Request\Model\NullModel;
use AvtoDev\CloudPayments\Message\Response\InvalidRequestResponse;
use AvtoDev\CloudPayments\Message\Response\SuccessResponse;
use AvtoDev\CloudPayments\Message\Strategy\StrategyInterface;
use AvtoDev\CloudPayments\Message\Strategy\SuccessStrategy;

/**
 * @method NullModel getModel()
 * @method InvalidRequestResponse|SuccessResponse send()
 * @method static TestRequest create()
 *
 * @see https://developers.cloudpayments.ru/#testovyy-metod
 */
class TestRequest extends AbstractRequest
{
    /**
     * {@inheritdoc}
     */
    public function createModel(): ModelInterface
    {
        return new NullModel;
    }

    /**
     * {@inheritdoc}
     */
    public function getStrategy(): StrategyInterface
    {
        return new SuccessStrategy;
    }

    /**
     * {@inheritdoc}
     */
    protected function getRelativeUrl(): string
    {
        return '/test';
    }
}
