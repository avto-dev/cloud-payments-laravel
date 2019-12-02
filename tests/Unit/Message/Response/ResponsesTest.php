<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Message\Response;

use AvtoDev\CloudPayments\Message\Response\ApplePayStartSessionResponse;
use AvtoDev\CloudPayments\Message\Response\Cryptogram3dSecureAuthRequiredResponse;
use AvtoDev\CloudPayments\Message\Response\CryptogramTransactionAcceptedResponse;
use AvtoDev\CloudPayments\Message\Response\CryptogramTransactionRejectedResponse;
use AvtoDev\CloudPayments\Message\Response\InvalidRequestResponse;
use AvtoDev\CloudPayments\Message\Response\Model\ApplePayStartSessionModel;
use AvtoDev\CloudPayments\Message\Response\Model\Cryptogram3dSecureAuthRequiredModel;
use AvtoDev\CloudPayments\Message\Response\Model\CryptogramTransactionAcceptedModel;
use AvtoDev\CloudPayments\Message\Response\Model\CryptogramTransactionRejectedModel;
use AvtoDev\CloudPayments\Message\Response\Model\NullModel;
use AvtoDev\CloudPayments\Message\Response\Model\RefundPaymentModel;
use AvtoDev\CloudPayments\Message\Response\Model\SubscriptionModel;
use AvtoDev\CloudPayments\Message\Response\Model\SubscriptionsModel;
use AvtoDev\CloudPayments\Message\Response\Model\TokenTransactionAcceptedModel;
use AvtoDev\CloudPayments\Message\Response\Model\TokenTransactionRejectedModel;
use AvtoDev\CloudPayments\Message\Response\RefundPaymentResponse;
use AvtoDev\CloudPayments\Message\Response\ResponseInterface;
use AvtoDev\CloudPayments\Message\Response\SubscriptionResponse;
use AvtoDev\CloudPayments\Message\Response\SubscriptionsResponse;
use AvtoDev\CloudPayments\Message\Response\SuccessResponse;
use AvtoDev\CloudPayments\Message\Response\TokenTransactionAcceptedResponse;
use AvtoDev\CloudPayments\Message\Response\TokenTransactionRejectedResponse;
use PHPUnit\Framework\TestCase;

/**
 * @group  unit
 * @group  responses
 * @covers \AvtoDev\CloudPayments\Message\Response\ApplePayStartSessionResponse
 * @covers \AvtoDev\CloudPayments\Message\Response\Cryptogram3dSecureAuthRequiredResponse
 * @covers \AvtoDev\CloudPayments\Message\Response\CryptogramTransactionAcceptedResponse
 * @covers \AvtoDev\CloudPayments\Message\Response\CryptogramTransactionRejectedResponse
 * @covers \AvtoDev\CloudPayments\Message\Response\InvalidRequestResponse
 * @covers \AvtoDev\CloudPayments\Message\Response\SubscriptionResponse
 * @covers \AvtoDev\CloudPayments\Message\Response\SubscriptionsResponse
 * @covers \AvtoDev\CloudPayments\Message\Response\SuccessResponse
 * @covers \AvtoDev\CloudPayments\Message\Response\TokenTransactionAcceptedResponse
 * @covers \AvtoDev\CloudPayments\Message\Response\TokenTransactionRejectedResponse
 * @covers \AvtoDev\CloudPayments\Message\Response\RefundPaymentResponse
 */
class ResponsesTest extends TestCase
{
    public function modelDataProvider()
    {
        return [
            ApplePayStartSessionResponse::class => [ApplePayStartSessionResponse::class, ApplePayStartSessionModel::class],

            Cryptogram3dSecureAuthRequiredResponse::class => [Cryptogram3dSecureAuthRequiredResponse::class, Cryptogram3dSecureAuthRequiredModel::class],

            CryptogramTransactionAcceptedResponse::class => [CryptogramTransactionAcceptedResponse::class, CryptogramTransactionAcceptedModel::class],

            CryptogramTransactionRejectedResponse::class => [CryptogramTransactionRejectedResponse::class, CryptogramTransactionRejectedModel::class],

            InvalidRequestResponse::class => [InvalidRequestResponse::class, NullModel::class],

            SubscriptionResponse::class => [SubscriptionResponse::class, SubscriptionModel::class],

            SubscriptionsResponse::class => [SubscriptionsResponse::class, SubscriptionsModel::class],

            SuccessResponse::class => [SuccessResponse::class, NullModel::class],

            TokenTransactionAcceptedResponse::class => [TokenTransactionAcceptedResponse::class, TokenTransactionAcceptedModel::class],

            TokenTransactionRejectedResponse::class => [TokenTransactionRejectedResponse::class, TokenTransactionRejectedModel::class],

            RefundPaymentResponse::class => [RefundPaymentResponse::class, RefundPaymentModel::class],
        ];
    }

    /**
     * @dataProvider modelDataProvider
     *
     * @param string $response_class_name
     * @param string $model_class
     */
    public function testCreate(string $response_class_name, string $model_class)
    {
        /** @var ResponseInterface $response */
        $response = new $response_class_name;
        $this->assertInstanceOf($model_class, $response->getModel());
    }
}
